<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Privilege Entity
 *
 * @property int $id
 * @property string $email
 * @property bool $is_active
 * @property string $company
 * @property string $company_profile_path
 * @property string $company_map_path
 * @property string $privileges_code
 * @property string $logo
 * @property string $tel
 * @property string $mobile_no
 * @property string $website
 * @property string $lat
 * @property string $long
 * @property string $address
 * @property string $name
 * @property string $overviews
 * @property string $privileges_categories_code
 * @property string $business_type
 * @property string $status
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime $end_date
 * @property string $fax
 * @property string $first_name
 * @property string $last_name
 * @property string $nationality_code
 * @property string $comment
 * @property string $province_code
 * @property string $district_code
 * @property string $sub_district
 * @property string $postal
 * @property int $reservation_policy
 * @property int $cancellation_policy
 * @property string $policy
 * @property int $rating_total
 * @property int $member_total
 * @property string $operating_hours
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $users_privileges_id
 * @property string $benefit_description
 *
 * @property \App\Model\Entity\UsersPrivilege $users_privilege
 * @property \App\Model\Entity\Atyourservice[] $atyourservice
 * @property \App\Model\Entity\Member[] $members
 * @property \App\Model\Entity\CarType[] $car_types
 * @property \App\Model\Entity\MeetingPoint[] $meeting_points
 * @property \App\Model\Entity\Place[] $places
 * @property \App\Model\Entity\ServiceRequire[] $service_requires
 * @property \App\Model\Entity\User[] $users
 */
class Privilege extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'email' => true,
        'is_active' => true,
        'company' => true,
        'company_profile_path' => true,
        'company_map_path' => true,
        'privileges_code' => true,
        'logo' => true,
        'tel' => true,
        'mobile_no' => true,
        'website' => true,
        'lat' => true,
        'long' => true,
        'address' => true,
        'name' => true,
        'overviews' => true,
        'privileges_categories_code' => true,
        'business_type' => true,
        'status' => true,
        'start_date' => true,
        'end_date' => true,
        'fax' => true,
        'first_name' => true,
        'last_name' => true,
        'nationality_code' => true,
        'comment' => true,
        'province_code' => true,
        'district_code' => true,
        'sub_district' => true,
        'postal' => true,
        'reservation_policy' => true,
        'cancellation_policy' => true,
        'policy' => true,
        'rating_total' => true,
        'member_total' => true,
        'operating_hours' => true,
        'created' => true,
        'modified' => true,
        'users_privileges_id' => true,
        'benefit_description' => true,
        'users_privilege' => true,
        'atyourservice' => true,
        'members' => true,
        'car_types' => true,
        'meeting_points' => true,
        'places' => true,
        'service_requires' => true,
        'users' => true
    ];
}
