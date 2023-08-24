<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Incoming\Answer;
use DB;
use Illuminate\Support\Facades\Log;

class BotmanController extends Controller
{

    public function enterRequest()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {
            $lowercaseMessage = strtolower($message);

            if ($this->isLocationQuestion($lowercaseMessage)) {
                $this->replyAddressInfo($botman);
            } elseif ($message == 'Hi! i need your help') {
                $this->askReply($botman);
            } elseif ($this->isGreeting($lowercaseMessage)) {
                $this->replyGreeting($botman);
            } elseif ($this->isBotNameQuestion($lowercaseMessage)) {
                $this->replyBotName($botman);
            } elseif ($this->isContactQuestion($lowercaseMessage)) {
                $this->replyContactInfo($botman);
            } elseif ($this->isFreeServiceQuestion($lowercaseMessage)) {
                $this->replyFreeServiceInfo($botman);
            } elseif ($this->isServiceListQuestion($lowercaseMessage)) {
                $this->replyServiceList($botman);
            } elseif ($this->isCenterDefinitionQuestion($lowercaseMessage)) {
                $this->replyCenterDefinition($botman);
            } elseif ($this->hasServiceKeywords($lowercaseMessage)) {
                $this->replyServiceInfo($botman, $lowercaseMessage);
            } elseif ($this->isRegistrationQuestion($lowercaseMessage)) {
                $this->replyRegistrationInfo($botman);
            } elseif ($this->isLoginQuestion($lowercaseMessage)) {
                $this->replyLoginInfo($botman);
            } elseif ($this->isTransportationQuestion($lowercaseMessage)) {
                $this->replyTransportationInfo($botman); // Provide transportation information
            } elseif ($this->isEnrollQuestion($lowercaseMessage)) {
                $this->replyEnrollInfo($botman);
            } elseif ($this->isOperatingHoursQuestion($lowercaseMessage)) {
                $this->replyOperatingHoursInfo($botman);
            } elseif ($this->isFacilitiesQuestion($lowercaseMessage)) {
                $this->replyFacilitiesInfo($botman);
            } elseif ($this->isVolunteerQuestion($lowercaseMessage)) {
                $this->replyVolunteerInfo($botman);
            } elseif ($this->isTourQuestion($lowercaseMessage)) {
                $this->replyTourInfo($botman);
            } elseif ($this->isEstablishedQuestion($lowercaseMessage)) {
                $this->replyEstablishedInfo($botman);
            } elseif ($this->isFloorsQuestion($lowercaseMessage)) {
                $this->replyFloorsInfo($botman);
            } elseif ($this->isSafetyQuestion($lowercaseMessage)) {
                $this->replySafetyInfo($botman);
            } elseif ($this->isInquiriesQuestion($lowercaseMessage)) {
                $this->replyInquiriesInfo($botman);
            } elseif ($this->isWhosInChargeQuestion($lowercaseMessage)) {
                $this->replyWhosInChargeInfo($botman);
            } elseif ($this->isWhosMedicalTeamQuestion($lowercaseMessage)) {
                $this->replyWhosMedicalTeamInfo($botman);
            } elseif ($this->isWhosEligibleQuestion($lowercaseMessage)) {
                $this->replyWhosEligibleInfo($botman);
            } elseif ($this->isWhosLeadingVolunteerQuestion($lowercaseMessage)) {
                $this->replyWhosLeadingVolunteerInfo($botman);
            } elseif ($this->isWhosTransportationQuestion($lowercaseMessage)) {
                $this->replyWhosTransportationInfo($botman);
            } elseif ($this->isMealServicesQuestion($lowercaseMessage)) {
                $this->replyMealServicesInfo($botman);
            } elseif ($this->isActivitiesQuestion($lowercaseMessage)) {
                $this->replyActivitiesInfo($botman);
            } elseif ($this->isHealthcareServicesQuestion($lowercaseMessage)) {
                $this->replyHealthcareServicesInfo($botman);
            } elseif ($this->isPaymentQuestion($lowercaseMessage)) {
                $this->replyPaymentInfo($botman);
            } elseif ($this->isAccompanyQuestion($lowercaseMessage)) {
                $this->replyToAccompanyQuestion($botman);
            } elseif ($this->isNeedRegistrationQuestion($lowercaseMessage)) {
                $this->replyToRegistrationQuestion($botman);
            } elseif ($this->isAvailEveryDayQuestion($lowercaseMessage)) {
                $this->replyAvailEveryDayInfo($botman);
            } elseif ($this->isHowTOBookQuestion($lowercaseMessage)) {
                $this->replyisHowTOBookInfo($botman);
            } elseif ($this->isAttendanceQuestion($lowercaseMessage)) {
                $this->replyAttendaneInfo($botman);
            } else {
                $this->fallbackReply($botman); // Handle questions the bot can't answer
            }

        });

        $botman->listen();

    }

    public function askReply($botman)
    {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {
            $name = $answer->getText();

            $this->say('Nice to meet you ' . $name);
        });
    }

    public function isLocationQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'address') !== false ||
        strpos($lowercaseMessage, 'location') !== false ||
        strpos($lowercaseMessage, 'lugar') !== false ||
            (strpos($lowercaseMessage, 'saan') !== false &&
            strpos($lowercaseMessage, 'center') !== false);
        (strpos($lowercaseMessage, 'paano') !== false &&
            strpos($lowercaseMessage, 'pumunta') !== false);

    }

    public function replyAddressInfo($botman)
    {
        $addressInfo = "Our center's address is 13, 1639 Ipil-Ipil Street North Signal Village, Taguig City. Feel free to drop by and say hello!";
        $googleMapEmbed = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15449.902540075029!2d121.04714724488926!3d14.514764798337161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf8d25c8aeb7%3A0xdfa535c74b7e5f1a!2sCenter%20for%20the%20Elderly!5e0!3m2!1sen!2sph!4v1692765819417!5m2!1sen!2sph" width="290" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

        $botman->reply($addressInfo . "\n\n" . $googleMapEmbed);
    }

    public function isGreeting($message)
    {
        return in_array($message, ['hi', 'hello']);
    }

    public function replyGreeting($botman)
    {
        $botman->reply("Hello! How can I help you?");
    }
    public function isBotNameQuestion($message)
    {
        return strpos($message, 'what is your name') !== false || $message === 'your name';
    }
    public function replyBotName($botman)
    {
        $botName = "I am Center for the eldery chat bot, here to assist you!";
        $botman->reply($botName);
    }
    public function isContactQuestion($message)
    {
        return strpos($message, 'contact') !== false ||
        strpos($message, 'email') !== false ||
        strpos($message, 'call') !== false ||
        strpos($message, 'tawag') !== false ||
        strpos($message, 'tawagan') !== false;

    }

    public function replyContactInfo($botman)
    {
        $contactInfo = "You can contact us at contact@example.com or give us a call at +123456789.";
        $botman->reply($contactInfo);
    }
    public function isFreeServiceQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return (
            (
                strpos($lowercaseMessage, 'free') !== false ||
                strpos($lowercaseMessage, 'libre') !== false ||
                strpos($lowercaseMessage, 'bayad') !== false ||
                strpos($lowercaseMessage, 'cost') !== false
            )
        );
    }

    public function replyFreeServiceInfo($botman)
    {
        $freeServiceInfo = "All of our services are offered for free. Please let us know which specific services you are interested in, and we'll provide more details!";
        $botman->reply($freeServiceInfo);
    }

    public function isServiceListQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return (
            strpos($lowercaseMessage, 'ano ang mga serbisyo') !== false ||
            strpos($lowercaseMessage, 'what are the services') !== false ||
            strpos($lowercaseMessage, 'ano ang mga services') !== false ||
            strpos($lowercaseMessage, 'ano ang mga service') !== false ||
            strpos($lowercaseMessage, 'serbisyo') !== false ||
            (strpos($lowercaseMessage, 'ano') !== false && strpos($lowercaseMessage, 'service') !== false) ||
            (strpos($lowercaseMessage, 'ano') !== false && strpos($lowercaseMessage, 'serbisyo') !== false) ||
            (strpos($lowercaseMessage, 'what') !== false && strpos($lowercaseMessage, 'service') !== false)
        );

    }

    public function replyServiceList($botman)
    {
        $services = DB::table('services')->pluck('title')->toArray();
        $serviceList = implode(', ', $services);
        $response = "Here are the services we offer: " . $serviceList;
        $botman->reply($response);
    }

    public function isCenterDefinitionQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return (
            strpos($lowercaseMessage, 'what') !== false &&
            strpos($lowercaseMessage, 'center for the elderly') !== false
        ) || (
            strpos($lowercaseMessage, 'about') !== false &&
            strpos($lowercaseMessage, 'elderly') !== false
        ) || (
            strpos($lowercaseMessage, 'about') !== false &&
            strpos($lowercaseMessage, 'center') !== false
        ) || (
            strpos($lowercaseMessage, 'meaning') !== false &&
            strpos($lowercaseMessage, 'center for the elderly') !== false
        );
    }

    public function replyCenterDefinition($botman)
    {
        $definition = "Center for the Elderly is a place dedicated to providing specialized services and care for senior citizens, with a focus on promoting their well-being and quality of life.";
        $botman->reply($definition);
    }

    public function hasServiceKeywords($message)
    {
        $services = DB::table('services')->pluck('title')->toArray();
        foreach ($services as $service) {
            if (strpos(strtolower($message), strtolower($service)) !== false) {
                return true;
            }
        }
        return false;
    }

    public function replyServiceInfo($botman, $message)
    {
        $services = DB::table('services')->pluck('title')->toArray();
        $matchedServices = [];

        foreach ($services as $service) {
            if (strpos(strtolower($message), strtolower($service)) !== false) {
                $matchedServices[] = $service;
            }
        }

        if (!empty($matchedServices)) {
            $response = "Yes, we offer the following service: " . implode(', ', $matchedServices);
        } else {
            $response = "I'm sorry, but I'm not sure if we offer the services you mentioned.";
        }

        $botman->reply($response);
    }
    public function isRegistrationQuestion($message)
    {
        $registrationKeywords = ['paano mag register ', 'how to register', 'how can I register', 'registration process'];

        foreach ($registrationKeywords as $keyword) {
            if (strpos($message, $keyword) !== false) {
                return true;
            }
        }

        return false;
    }

    public function replyRegistrationInfo($botman)
    {
        $registrationInfo = "To register, please visit our website and fill out the registration form. You will need a valid email address to complete the registration. If you have any further inquiries, you can contact our center at #. If you don't have a valid email, you can also walk in to the center, and our staff will be happy to assist you with the registration process.";
        $botman->reply($registrationInfo);
    }

    public function isLoginQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'how to login') !== false ||
        strpos($lowercaseMessage, 'how can I login') !== false ||
        strpos($lowercaseMessage, 'login process') !== false ||
        strpos($lowercaseMessage, 'login') !== false;

    }

    public function replyLoginInfo($botman)
    {
        $botman->reply("To login, please follow these steps:\n1. Visit our website.\n2. Click on the 'Login' button.\n3. Enter your email or username and password.\n4. Click the 'Login' button again to access your account.");
    }
    public function isTransportationQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'transportation') !== false ||
        strpos($lowercaseMessage, 'transportasyon') !== false ||
        strpos($lowercaseMessage, 'sundo') !== false ||
        strpos($lowercaseMessage, 'hatid') !== false ||
        strpos($lowercaseMessage, 'transport') !== false ||
        strpos($lowercaseMessage, 'transpo') !== false;

    }

    public function replyTransportationInfo($botman)
    {
        $botman->reply("Yes, we offer transportation services for elderly individuals. We provide pick-up and drop-off services to help them reach the center safely and conveniently. If you have more specific questions about our transportation services, feel free to ask!");
    }

    public function isEnrollQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'enroll') !== false ||
            (strpos($lowercaseMessage, 'paano') !== false && strpos($lowercaseMessage, 'avail') !== false);
    }

    public function replyEnrollInfo($botman)
    {
        $botman->reply("To register your elderly family member, please visit our website and follow the registration process outlined there. You can also contact us directly for assistance with the registration process.");
    }
    public function isOperatingHoursQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'open') !== false ||
        strpos($lowercaseMessage, 'operating') !== false ||
        strpos($lowercaseMessage, 'hours') !== false ||
        strpos($lowercaseMessage, 'close') !== false;
    }

    public function replyOperatingHoursInfo($botman)
    {
        $botman->reply("Our center operates from 8am to 5pm. We are open to serve you during these hours. Feel free to contact us for more information.");
    }

    public function isFacilitiesQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'facilities') !== false || strpos($lowercaseMessage, 'facility') !== false;
    }

    public function replyFacilitiesInfo($botman)
    {
        $botman->reply("Our center offers various facilities to enhance the experience of our elderly members. These include [Facilities List]. You can visit us to explore our facilities firsthand.");
    }
    public function isVolunteerQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'volunteer') !== false;
    }

    public function replyVolunteerInfo($botman)
    {
        $botman->reply("If you're interested in volunteering to help at our center, please reach out to our volunteer coordinator. They will provide you with more information and guide you through the process.");
    }

    public function isTourQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'tour') !== false || strpos($lowercaseMessage, 'see') !== false;
    }

    public function replyTourInfo($botman)
    {
        $botman->reply("You can certainly schedule a tour of our center to see our facilities. Please contact us to arrange a convenient time for your visit.");
    }

    public function isEstablishedQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'when was the center established') !== false ||
        strpos($lowercaseMessage, 'center establishment date') !== false ||
        strpos($lowercaseMessage, 'when was the center founded') !== false ||
        strpos($lowercaseMessage, 'when was the center started') !== false ||
        strpos($lowercaseMessage, 'started') !== false ||
        strpos($lowercaseMessage, 'established') !== false;
    }

    public function replyEstablishedInfo($botman)
    {
        $botman->reply("Our center was established in 2019. We've been serving the elderly community since then.");
    }
    public function isFloorsQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'how many floors does the center have') !== false ||
        strpos($lowercaseMessage, 'number of floors in the center') !== false ||
        strpos($lowercaseMessage, 'floor count of the center') !== false ||
        strpos($lowercaseMessage, 'center\'s building floors') !== false ||
        strpos($lowercaseMessage, 'floor') !== false ||
        strpos($lowercaseMessage, 'floors') !== false ||
        strpos($lowercaseMessage, 'kataas') !== false;

    }

    public function replyFloorsInfo($botman)
    {
        $floorsCount = 5; // Replace with the actual number of floors
        $botman->reply("Our center has $floorsCount floors. Each floor offers various facilities and services for our elderly community.");
    }
    public function isSafetyQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'safety') !== false ||
        strpos($lowercaseMessage, 'security') !== false ||
        strpos($lowercaseMessage, 'secure') !== false ||
        strpos($lowercaseMessage, 'measures') !== false ||
        strpos($lowercaseMessage, 'safe') !== false ||
        strpos($lowercaseMessage, 'ligtas') !== false;
    }

    public function isInquiriesQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'inquiries') !== false ||
        strpos($lowercaseMessage, 'questions') !== false ||
        strpos($lowercaseMessage, 'further information') !== false ||
        strpos($lowercaseMessage, 'more details') !== false;
    }

    public function replySafetyInfo($botman)
    {
        $botman->reply("We prioritize the safety of our elderly members. We have various safety measures in place, including 24/7 security personnel, surveillance cameras, and emergency response protocols.");
    }

    public function replyInquiriesInfo($botman)
    {
        $botman->reply("If you have any further inquiries, questions, or need more information, please don't hesitate to contact us. You can reach our customer support team at [contact details]. We are here to assist you!");
    }

    public function fallbackReply($botman)
    {
        $fallbackResponse = "I'm sorry, but I don't have an answer for that question right now. If you have any other inquiries, feel free to ask!";
        $botman->reply($fallbackResponse);

        // Log the unanswered question
        $this->logUnansweredQuestion($botman->getMessage()->getText());
    }

    private function logUnansweredQuestion($question)
    {
        // You can customize the log path and details based on your needs
        Log::channel('unanswered_questions')->info('Unanswered question: ' . $question);
    }

    // Who's
    public function isWhosInChargeQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'who\'s in charge') !== false ||
        strpos($lowercaseMessage, 'center director') !== false ||
        strpos($lowercaseMessage, 'head of the center') !== false ||
        strpos($lowercaseMessage, 'person in charge') !== false ||
        strpos($lowercaseMessage, 'leader of the center') !== false ||
        strpos($lowercaseMessage, 'sino ang namumuno') !== false ||
        strpos($lowercaseMessage, 'sino ang lider ng center') !== false ||
            (strpos($lowercaseMessage, 'sino') !== false && strpos($lowercaseMessage, 'leader') !== false) ||
            (strpos($lowercaseMessage, 'sino') !== false && strpos($lowercaseMessage, 'lider') !== false) ||
            (strpos($lowercaseMessage, 'who') !== false && strpos($lowercaseMessage, 'leader') !== false) ||
            (strpos($lowercaseMessage, 'sino') !== false && strpos($lowercaseMessage, 'charge') !== false);
    }

    public function replyWhosInChargeInfo($botman)
    {
        $directorInfo = "The center's director is [Name]  who is responsible for overseeing its operations and providing leadership.";
        $botman->reply($directorInfo);
    }

    // Who's part of the medical team at the center?
    public function isWhosMedicalTeamQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'who\'s part of the medical team') !== false ||
        strpos($lowercaseMessage, 'who\'s on the medical team') !== false ||
        strpos($lowercaseMessage, 'medical professionals') !== false ||
        strpos($lowercaseMessage, 'sino ang kasama sa medical team') !== false ||
        strpos($lowercaseMessage, 'sino ang mga doktor') !== false ||
        strpos($lowercaseMessage, 'sino ang mga nurse') !== false ||
        strpos($lowercaseMessage, 'sino ang mga healthcare professionals') !== false ||
            (strpos($lowercaseMessage, 'sino') !== false && strpos($lowercaseMessage, 'nurse') !== false) ||
            (strpos($lowercaseMessage, 'medical') !== false && strpos($lowercaseMessage, 'team') !== false) ||
            (strpos($lowercaseMessage, 'sino') !== false && strpos($lowercaseMessage, 'doktor') !== false) ||
            (strpos($lowercaseMessage, 'sino') !== false && strpos($lowercaseMessage, 'doctor') !== false) ||
            (strpos($lowercaseMessage, 'who') !== false && strpos($lowercaseMessage, 'doktor') !== false) ||
            (strpos($lowercaseMessage, 'doctor') !== false || strpos($lowercaseMessage, 'doktor') !== false);
    }

    public function replyWhosMedicalTeamInfo($botman)
    {
        $medicalTeamInfo = "Our medical team includes experienced doctors, nurses, and healthcare professionals.";
        $botman->reply($medicalTeamInfo);
    }

// Who's eligible to join the center for the elderly?
    public function isWhosEligibleQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'who\'s eligible to join') !== false ||
        strpos($lowercaseMessage, 'who can join the center') !== false ||
        strpos($lowercaseMessage, 'sino ang eligible na sumali') !== false ||
        strpos($lowercaseMessage, 'sino ang pwedeng sumali sa center') !== false ||
            (strpos($lowercaseMessage, 'sino') !== false && strpos($lowercaseMessage, 'eligible') !== false) ||
            (strpos($lowercaseMessage, 'sino') !== false && strpos($lowercaseMessage, 'sumali') !== false) ||
            (strpos($lowercaseMessage, 'eligible') !== false || strpos($lowercaseMessage, 'sumali') !== false) ||
            (strpos($lowercaseMessage, 'pwede') !== false && strpos($lowercaseMessage, 'taguig') !== false) ||
            (strpos($lowercaseMessage, 'puwede') !== false && strpos($lowercaseMessage, 'taguig') !== false) ||
            (strpos($lowercaseMessage, 'taga') !== false && strpos($lowercaseMessage, 'taguig') !== false) ||
            (strpos($lowercaseMessage, 'tiga') !== false && strpos($lowercaseMessage, 'taguig') !== false);
    }

    public function replyWhosEligibleInfo($botman)
    {
        $eligibilityInfo = "Elderly citizens of Taguig, can join the center.";
        $botman->reply($eligibilityInfo);
    }

    public function isWhosLeadingVolunteerQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'who\'s leading the volunteer efforts') !== false ||
        strpos($lowercaseMessage, 'who\'s in charge of volunteers') !== false ||
        strpos($lowercaseMessage, 'sino ang nangunguna sa mga volunteer') !== false ||
        strpos($lowercaseMessage, 'sino ang leader ng mga volunteer') !== false ||
            (strpos($lowercaseMessage, 'volunteer') !== false && strpos($lowercaseMessage, 'leader') !== false);
    }

    public function replyWhosLeadingVolunteerInfo($botman)
    {
        $volunteerLeaderInfo = "Our dedicated volunteer coordinator leads our volunteer efforts.";
        $botman->reply($volunteerLeaderInfo);
    }

    public function isWhosTransportationQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'who\'s available to assist with transportation') !== false ||
        strpos($lowercaseMessage, 'who provides transportation services') !== false ||
        strpos($lowercaseMessage, 'sino ang available para sa transportation services') !== false ||
        strpos($lowercaseMessage, 'sino ang nagbibigay ng serbisyo sa transportation') !== false ||
        strpos($lowercaseMessage, 'driver') !== false;
    }

    public function replyWhosTransportationInfo($botman)
    {
        $transportationInfo = "Our transportation team is available to assist elderly individuals who require transportation services.";
        $botman->reply($transportationInfo);
    }

    public function isMealServicesQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'meal services') !== false ||
        strpos($lowercaseMessage, 'food services') !== false ||
        strpos($lowercaseMessage, 'ano ang mga pagkain') !== false ||
        strpos($lowercaseMessage, 'ano ang mga kainan') !== false ||
            (strpos($lowercaseMessage, 'food') !== false && strpos($lowercaseMessage, 'service') !== false) ||
            (strpos($lowercaseMessage, 'food') !== false && strpos($lowercaseMessage, 'services') !== false) ||
            (strpos($lowercaseMessage, 'meal') !== false && strpos($lowercaseMessage, 'services') !== false) ||
            (strpos($lowercaseMessage, 'meal') !== false && strpos($lowercaseMessage, 'service') !== false) ||
            (strpos($lowercaseMessage, 'meal') !== false || strpos($lowercaseMessage, 'pagkain') !== false || strpos($lowercaseMessage, 'food') !== false || strpos($lowercaseMessage, 'pantry') !== false);
    }

    public function replyMealServicesInfo($botman)
    {
        $mealServicesInfo = "We provide nutritious meal services for our elderly members. Our meals are carefully prepared to meet their dietary needs.";
        $botman->reply($mealServicesInfo);
    }
    public function isActivitiesQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'activities') !== false ||
        strpos($lowercaseMessage, 'programs') !== false ||
        strpos($lowercaseMessage, 'ano ang mga activities') !== false ||
        strpos($lowercaseMessage, 'ano ang mga programa') !== false ||
            (strpos($lowercaseMessage, 'activities') !== false || strpos($lowercaseMessage, 'program') !== false || strpos($lowercaseMessage, 'programa') !== false);
    }

    public function replyActivitiesInfo($botman)
    {
        $activitiesInfo = "We offer a range of engaging activities and programs for our elderly members, including exercise classes, workshops, and social events.";
        $botman->reply($activitiesInfo);
    }
    public function isHealthcareServicesQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'healthcare services') !== false ||
        strpos($lowercaseMessage, 'medical care') !== false ||
        strpos($lowercaseMessage, 'ano ang mga serbisyong medikal') !== false ||
        strpos($lowercaseMessage, 'ano ang mga pangangailangan sa kalusugan') !== false ||
            (strpos($lowercaseMessage, 'medical') !== false || strpos($lowercaseMessage, 'healthcare') !== false || strpos($lowercaseMessage, 'medikal') !== false) ||
            (strpos($lowercaseMessage, 'kalusugan') !== false || strpos($lowercaseMessage, 'care') !== false);
    }

    public function replyHealthcareServicesInfo($botman)
    {
        $healthcareServicesInfo = "Our healthcare services include regular check-ups, medication management, and specialized care tailored to the needs of our elderly members.";
        $botman->reply($healthcareServicesInfo);
    }
    public function isPaymentQuestion($message)
    {
        $lowercaseMessage = strtolower($message);
        return strpos($lowercaseMessage, 'payment') !== false ||
        strpos($lowercaseMessage, 'fees') !== false ||
        strpos($lowercaseMessage, 'how much does it cost') !== false ||
        strpos($lowercaseMessage, 'magkano ang bayad') !== false;
    }

    public function replyPaymentInfo($botman)
    {
        $paymentInfo = "Our services are offered for free, but there might be fees associated with certain specialized services. Please contact us for detailed information on fees and payment options.";
        $botman->reply($paymentInfo);
    }
    public function isAccompanyQuestion($message)
    {
        // Define keywords to identify the question
        $keywords = ['accompany', 'someone with me', 'kasama'];

        // Convert the user's message to lowercase for case-insensitive matching
        $lowercaseMessage = strtolower($message);

        // Check if any of the keywords are present in the message
        foreach ($keywords as $keyword) {
            if (strpos($lowercaseMessage, $keyword) !== false) {
                return true; // The question is found
            }
        }

        return false; // The question is not found
    }

// Function to reply to the accompany question
    public function replyToAccompanyQuestion($botman)
    {
        // Reply to the user's question
        $botman->reply("Certainly! Someone can accompany you. Please provide us with more details about the event and your preferences.");
    }

    public function isNeedRegistrationQuestion($message)
    {
        // Define keywords to identify the question
        $keywords = ['sign up', 'need to register', 'required to register'];

        // Convert the user's message to lowercase for case-insensitive matching
        $lowercaseMessage = strtolower($message);

        // Check if any of the keywords are present in the message
        foreach ($keywords as $keyword) {
            if (strpos($lowercaseMessage, $keyword) !== false) {
                return true; // The question is found
            }
        }

        return false; // The question is not found
    }

// Function to reply to the registration question
    public function replyToRegistrationQuestion($botman)
    {
        // Reply to the user's question
        $botman->reply("Yes, you need to register to avail our services. Registration helps us provide you with a better experience and tailored services. You can easily register on our website or contact our customer support for assistance.");
    }

    public function isAvailEveryDayQuestion($message)
    {
        // Define keywords to identify the question
        $keywords = [
            'can I use your services every day',
            'are the center\'s services accessible on a daily basis',
            'is it possible to utilize the center\'s services daily',
            'can I make use of your services every day of the week',
            'do you offer services on a daily basis',
            'are your services open for use every day',
            'is the center\'s assistance accessible daily',
            'do your services operate on a daily schedule',
            'can I avail your center\'s services daily without any restrictions',
            'are your services available for me to use every day',
            'can I access your services daily',
            'do I have the option to use your services every day',
            'is daily usage of your services allowed',
            'is there a limit to how often I can avail your services',
            'are your services offered daily',
            'is it permissible to use your services every day',
            'are there any restrictions on daily service usage',
            'can I use your services 7 days a week',
            'do your services have daily availability',
            'is your service operational every day',
            'can I get your services every day',
            'can I utilize your services on a daily basis',
            'do you provide services every day',
            'is daily service utilization an option',
            'can I take advantage of your services daily',
            'can i avail everyday',
            'can i book schedule everyday',
            'pwede ba araw araw mag pa schedule',
            'can i avail the center services everyday',

            // Tagalog translations
            'pwede ko bang gamitin ang inyong serbisyo araw araw',
            'maa-access ba ang mga serbisyo ng sentro araw araw',
            'maaari bang gamitin ang mga serbisyo ng sentro araw araw',
            'pwede ko bang gamitin ang inyong serbisyo tuwing araw ng linggo',
            'nag-aalok ba kayo ng serbisyo araw araw',
            'bukas ba ang inyong mga serbisyo para sa araw araw na paggamit',
            'maa-access ba ang tulong ng sentro araw araw',
            'nag-ooperate ba ang inyong mga serbisyo sa iskedyul na araw araw',
            'maaari bang gamitin ang mga serbisyo ng inyong sentro araw araw nang walang anumang mga limitasyon',
            'magagamit ba ang inyong mga serbisyo para sa akin araw araw',
            'maaari bang magamit ang inyong mga serbisyo araw araw',
            'mayroon ba akong opsyon na gamitin ang inyong mga serbisyo araw araw',
            'pinapahintulutan ba ang araw araw na paggamit ng inyong mga serbisyo',
            'may limitasyon ba sa kung gaano kadalas ako makapagamit ng inyong mga serbisyo',
            'iniaalok ba ang inyong mga serbisyo araw araw',
            'maaari bang gamitin ang inyong mga serbisyo araw araw',
            'may mga limitasyon ba sa araw araw na paggamit ng serbisyo',
            'pwede ba akong gumamit ng inyong mga serbisyo ng 7 araw sa isang linggo',
            'nagkakaroon ba ng araw araw na availability ang inyong mga serbisyo',
            'nag-ooperate ba ang inyong serbisyo araw araw',
            'maaari bang makuha ang inyong mga serbisyo araw araw',
            'maaari bang gamitin ang inyong mga serbisyo araw araw',
            'nagbibigay ba kayo ng mga serbisyo araw araw',
            'may opsyon bang araw araw na paggamit ng serbisyo',
            'maaari bang gamitin ang inyong mga serbisyo araw araw',
            'pwede ba akong mag-avail araw araw',
            'pwede ba akong mag-book ng schedule araw araw',
            'pwede ba araw araw',
        ];

        // Convert the user's message to lowercase for case-insensitive matching
        $lowercaseMessage = strtolower($message);

        // Check if any of the keywords are present in the message
        foreach ($keywords as $keyword) {
            if (strpos($lowercaseMessage, $keyword) !== false) {
                return true; // The question is found
            }
        }

        return false; // The question is not found
    }

    public function replyAvailEveryDayInfo($botman)
    {
        // Reply to the user's question
        $botman->reply("Yes, absolutely! Our services are available for you every day.");
    }

    public function isHowTOBookQuestion($message)
    {
        // Define keywords to identify the question
        $keywords = [
            // English phrases
            'how to book a schedule',
            'steps to schedule an appointment',
            'procedure to make a booking',
            'how can I reserve a time slot',
            'process of scheduling a visit',
            'ways to book an appointment',
            'booking a schedule guide',
            'what is the booking procedure',
            'how do I schedule an appointment',
            'can you guide me on booking a slot',

            // Mixed English and Tagalog
            'paano mag book ng schedule',
            'steps sa pag schedule ng appointment',
            'ano ang proseso sa paggawa ng booking',
            'paano mag reserba ng time slot',
            'proseso ng pag schedule ng bisita',
            'mga paraan sa pag book ng appointment',
            'guide sa pag book ng iskedyul',
            'ano ang proseso ng pag book',
            'paano ko isaschedule ang appointment',
            'maari mo ba akong tulungan sa pag book ng slot',
            'paano mag pa schedule',
            'paano mag pa book',
            'paano mag pa appointment',

            // Tagalog phrases
            'paano mag book ng oras',
            'mga hakbang sa pag schedule ng appointment',
            'proseso sa paggawa ng booking',
            'paano mag reserba ng time slot',
            'pamamaraan ng pag schedule ng pagdalaw',
            'mga paraan sa pag book ng appointment',
            'gabay sa pag book ng iskedyul',
            'ano ang proseso ng pag book',
            'paano ko isaschedule ang appointment',
            'maari mo bang tulungan ako sa pag book ng slot',
            'paano mag book',
        ];

        // Convert the user's message to lowercase for case-insensitive matching
        $lowercaseMessage = strtolower($message);

        // Check if any of the keywords are present in the message
        foreach ($keywords as $keyword) {
            if (strpos($lowercaseMessage, $keyword) !== false) {
                return true; // The question is found
            }
        }

        return false; // The question is not found
    }

// Function to reply to the registration question
    public function replyisHowTOBookInfo($botman)
    {
        // Reply to the user's question
        $bookingReply = "To book a schedule, follow these steps:<br><br>" .
            "1. Register or login to our system on our website.<br>" .
            "2. Once logged in, navigate to your Homepage.<br>" .
            "3. Click on the 'Add Schedule' option.<br>" .
            "4. Select the services you want to book.<br>" .
            "5. Choose a suitable date and time.<br>" .
            "6. Confirm your booking.<br><br>" .
            "Additionally, we also welcome walk-in appointments. Feel free to visit us at our location for immediate assistance.";

        $botman->reply($bookingReply);
    }

    public function isAttendanceQuestion($message)
    {
        // Define keywords to identify the question
        $attendanceKeywords = [
            // Full phrases
            'do I have to attend',
            'is attendance required',
            'is it necessary to show up',
            'am I obligated to come to my schedule',
            'is attending my appointment mandatory',
            'do I need to be present for my appointment',
            'do I need to show up to my schedule',
            'do I need to be there for my appointment',
            'is it a must to attend to my schedule',

            // Short keywords
            'need to attend',
            'attendance required',
            'necessary to show up',
            'obligated to come',
            'obligated to attend',

            // Slangs and mixed phrases
            'kailangan bang pumunta',
            'kailangan bang sumipot',
            'dapat bang pumunta',
            'dapat bang sumipot',
            'need ko bang puntahan',
            'need ko bang pumunta',

            // Tagalog translations with short forms
            'kailangan ko bang pumunta',
            'kailangan ba sumipot',
            'dapat ba akong pumunta',
        ];
        $notAttendingKeywords = [
            // Full phrases
            'is it fine not to attend to my schedule',
            'is it okay if I miss my appointment',
            'can I skip my booked schedule',
            'is it acceptable to not show up for my appointment',
            'what happens if I don\'t come to my schedule',
            'pwede bang hindi ako sumipot sa aking schedule',
            'okay lang bang hindi pumunta sa aking appointment',
            'pwede bang hindi ko na puntahan ang aking appointment',

            // Short keywords
            'not attending schedule',
            'missing appointment',
            'skip booked schedule',
            'not showing up for appointment',
            'not attending my appointment',

            // Slangs and mixed phrases
            'okay lang ba kung hindi ako pupunta sa schedule ko',
            'pwede bang hindi ako mag-show sa schedule ko',
            'pwede bang hindi ko puntahan yung schedule ko',
            'okay lang ba kung hindi ako pupunta sa appointment ko',
            'pwede bang hindi ako mag-show sa appointment ko',
            'pwede bang hindi ko puntahan yung appointment ko',

            // Tagalog translations with short forms
            'pwede bang hindi sumipot sa schedule',
            'hindi pumunta sa appointment',
            'pwede bang hindi sumipot sa appointment',
        ];

        // Combine with the previous notAttendingKeywords array
        $keywords = array_merge($notAttendingKeywords, $attendanceKeywords);

        // Convert the user's message to lowercase for case-insensitive matching
        $lowercaseMessage = strtolower($message);

        // Check if any of the keywords are present in the message
        foreach ($keywords as $keyword) {
            if (strpos($lowercaseMessage, $keyword) !== false) {
                return true; // The question is found
            }
        }

        return false; // The question is not found
    }

    // Function to reply to the registration question
    public function replyAttendaneInfo($botman)
    {
        // Reply to the user's question
        $AttendingReply = "If you choose not to attend, please be aware that it might lead to account restrictions or other consequences. It's recommended to keep your appointments to ensure a smooth experience.";

        $botman->reply($AttendingReply);

    }
}
