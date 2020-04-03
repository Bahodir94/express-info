<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'company_name', 'site', 'foundation_year', 'customer_type', 'contractor_type',
        'gender', 'birthday_date', 'specialization', 'skills',
        'facebook', 'vk', 'telegram', 'whatsapp', 'instagram',
        'phone_number', 'about_myself',
        'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private static $UPLOAD_DIRECTORY = 'uploads/users/';

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * All user's companies
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class, 'user_id', 'id');
    }

    /**
     * Get user role
     *
     * @return Role
    */
    public function getRole()
    {
        return $this->roles[0];
    }

    /**
     * Check if user has any role
     *
     * @return boolean
    */
    public function hasOneRole()
    {
        return isset($this->roles[0]);
    }

    /**
     * Authorize role for user
     *
     * @param string|array $roles
     *
     * @return bool
     */
    public function authorizeRole($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized.');
        }

        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }

    /**
     * Check multiple roles
     *
     * @param array $roles
     *
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     *
     * Check one role
     *
     * @param string $role
     *
     * @return boolean
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * User categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this
            ->belongsToMany(HandbookCategory::class, 'user_category', 'user_id', 'category_id')
            ->withPivot('price_from', 'price_to', 'price_per_hour');
    }

    /**
     * Get history of user's actions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function history()
    {
        return $this->hasMany(HistoryItem::class, 'user_id', 'id');
    }

    /**
     * Create history item for user
     *
     * @param string $type
     * @param string $meta
     * @return void
     */
    public function addHistoryItem(string $type, string $meta)
    {
        $this->history()->create(['type' => $type, 'meta' => $meta]);
    }

    /**
     * Upload an image and save it in file storage
     *
     * @param $image
     */
    public function uploadImage($image)
    {
        if (!$image) return;

        $this->removeImage();
        $filename = $this->generateFileName($image->extension());
        $image->storeAs(self::$UPLOAD_DIRECTORY, $filename);
        $this->saveImageName($filename);
    }

    /**
     * Set default user avatar
     *
     * @return void
    */
    public function setDefaultAvatar()
    {
        $this->image = 'avatar0.jpg';
        $this->save();
    }

    /**
     * Generate filename for image
     *
     * @param string $imageName
     * @return string
     */
    private function generateFileName(string $imageName)
    {
        return str_random(20) . $imageName;
    }

    /**
     * Get image filename
     *
     * @return string
     */
    public function getImage()
    {
        if ($this->image)
            return '/' . self::$UPLOAD_DIRECTORY . $this->image;
        else
            return asset('assets/img/avatars/avatar15.jpg');
    }

    /**
     * Remove an image
     *
     * @return void
     */
    public function removeImage()
    {
        if ($this->image) {
            Storage::delete(self::$UPLOAD_DIRECTORY . $this->image);
        }
    }

    /**
     * Save an image name to the database
     *
     * @param string $imageName
     * @return void
     */
    private function saveImageName(string $imageName)
    {
        $this->image = $imageName;
        $this->save();
    }

    /**
     * Save password for the user
     *
     * @param string $password
     * @return void
    */
    public function savePassword(string $password)
    {
        $this->password = Hash::make($password);
        $this->save();
    }

    /**
     * Check if user has completed account
     *
     * @return bool
     */
    public function checkCompletedAccount()
    {
        // TODO: Check account for completed data
        return true;
    }

    public function getFirstName()
    {
        $explodedName = explode(' ', $this->name);
        if (isset($explodedName[0]))
            return $explodedName[0];
        return '';
    }

    public function getSecondName()
    {
        $explodedName = explode(' ', $this->name);
        array_slice($explodedName, 1);
        return implode(' ', array_slice($explodedName, 1));
    }
}
