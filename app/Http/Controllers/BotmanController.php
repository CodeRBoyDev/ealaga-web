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
        strpos($lowercaseMessage, 'saan') !== false ||
        strpos($lowercaseMessage, 'pumunta') !== false;

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
        $registrationKeywords = ['paano', 'paano mag register ', 'how to register', 'how can I register', 'registration process'];

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
}