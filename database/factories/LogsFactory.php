<?php

namespace Database\Factories;

use App\Models\Logs;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogsFactory extends Factory
{
    protected $model = Logs::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $geoloc = array(
            array(
                'display' => 'United Kingdom',
                'language' => array(
                    'lang' => 'en-GB',
                    'accept-language' => 'en-GB,en-US'
                ),
                'timezone' => 0,
                'mobile' => array(
                    'androied' => 50,
                    'ios' => 50
                ),
                'countryCode' => 'gb',
                'region' => 'all',
                'city' => 'all'
            ),
            array(
                'display' => 'United State',
                'language' => array(
                    'lang' => 'en-US',
                    'accept-language' => 'en-GB,en-US'
                ),
                'timezone' => 12,
                'mobile' => array(
                    'androied' => 30,
                    'ios' => 70
                ),
                'countryCode' => 'us',
                'region' => 'all',
                'city' => 'all'
            ),
            array(
                'display' => 'Bangladesh',
                'language' => array(
                    'lang' => 'bg-BD',
                    'accept-language' => 'bg-BD,en-GB,en-US'
                ),
                'timezone' => 6,
                'mobile' => array(
                    'androied' => 80,
                    'ios' => 20
                ),
                'countryCode' => 'bd',
                'region' => 'all',
                'city' => 'all'
            )
        );
        $url = $this->faker->domainName();
        $json_data = array(
            'mobileMode' => true,
            'toSearch' => array(
                'url' => $url,
                'name' => strtoupper($url)
            ),
            'geolocation' => $geoloc[rand(0,2)]
        );
        $dates = $this->faker->dateTimeBetween('-10 days', 'now');
        return [
            'params' => json_encode($json_data),
            'position' => $this->faker->randomDigit(),
            'ended_at' => $dates->format('Y-m-d H:i:s'),
            'ended_at_date' => $dates->format('Y-m-d')
        ];
    }
}
