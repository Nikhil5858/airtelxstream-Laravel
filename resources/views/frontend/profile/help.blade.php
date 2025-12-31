@extends('frontend.layouts.master')

@section('title', 'Help')

@section('content')

    <div class="custom-tabs">
        <span class="tab active" data-target="faq">FAQ</span>
        <span class="tab" data-target="terms">Terms of Uses</span>
        <span class="tab" data-target="privacy">Privacy Policy</span>
        <span class="tab" data-target="subscription">Subscription</span>
        <span class="tab" data-target="feedback">Content Feedback</span>
    </div>

    <div id="faq" class="tab-content active">
        <div class="accordion faq-accordion" id="faqAccordion">

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq1">
                        What is Airtel Xstream Play?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        The Airtel Xstream Play app is your one-stop destination to access and manage your OTT
                        subscriptions. You can:
                        <ul>
                            <li>Discover and watch premium and free content</li>
                            <li>Claim and manage OTT subscriptions bundled with your subscription pack</li>
                            <li>Get personalized content recommendations</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq2">
                        What is Airtel's 25+ OTT Pack? button
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        This D2C pack is a standalone OTT bundle available at ₹279 for 1 month. It includes access to:
                        <ul>
                            <li>Netflix Basic </li>
                            <li>JioHotstar Super </li>
                            <li>Zee5 Premium </li>
                            <li>Airtel Xstream Play premium pack</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq3">
                        How do I activate my 25+OTT via Airtel Xstream Play app?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ul>
                            Follow these steps:
                            <li>Discover and watch premium and free content</li>
                            <li>Log in using your Airtel mobile number</li>
                            <li>Log in using your Airtel mobile number</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq4">
                        Do I need to install individual OTT apps to watch content?
                    </button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes. It is mandatory to install:
                        <ul>
                            <li>Netflix Basic</li>
                            <li>JioHotstar</li>
                            <li>Zee5</li>
                            <li>Airtel Xstream Play</li>
                            Note: Zee5 content discovery and playback should be through Airtel Xstream Play.
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq5">
                        How do I know if my 25+ OTT subscriptions are active?
                    </button>
                </h2>
                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">

                        <ul>
                            <li>Go to the My Plans Page on Airtel Xstream Play app</li>
                            <li>Check subscription status of each OTT</li>
                            <li>Ensure all OTTs are claimed to avoid playback errors</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq6">
                        What if I don't see my purchased OTT content or face issues?
                    </button>
                </h2>
                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Check if the subscription is active in the My Plans Page/li>
                            <li>Confirm you're logged into the correct email/account for each OTT</li>
                            <li>If issues persist, contact support at: support-airtelxstream@airtel.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq7">
                        Can I use an existing email ID to claim OTT benefits?
                    </button>
                </h2>
                <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Use a new email ID that has not been previously used for direct subscriptions or past claims on
                        Airtel network.
                        <ul>
                            <li>This ensures a smooth activation and avoids rejection from the partner platform.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq8">
                        What happens if I purchase a direct OTT subscription with the same email as used in the Airtel
                        Xstream pack?
                    </button>
                </h2>
                <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        The Airtel Xstream Play app is your one-stop destination to access and manage your OTT
                        subscriptions. You can:
                        <ul>
                            It is advisable to use a fresh email ID for OTT claims wherever required. If not, there could be
                            <li>Conflict in account verification</li>
                            <li>Denial of access due to existing subscriptions</li>
                            <li>Get personalized content recommendations</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq9">
                        Do I need to claim the JioHotstar manually?
                    </button>
                </h2>
                <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        No. JioHotstar is preactivated.
                        <ul>
                            <li>Open the JioHotstar app and login using your Airtel number</li>
                            <li>You can also discover and watch JioHotstar content directly within Xstream Play</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq10">
                        How do I claim Zee5 Premium?
                    </button>
                </h2>
                <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Open the Xstream Play app
                        <ul>
                            <li>Navigate to the My Plans Page and click on Claim Zee5</li>
                            <li>Post claim, you'll be redirected to the Zee5 content channel page inside Xstream for
                                consumption</li>
                            <li>Note: Zee5 app installation is required but content playback will happen on Xstream.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq11">
                        What should I do if payment is deducted but the subscription isn't activated?
                    </button>
                </h2>
                <div id="faq11" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Check confirmation message/SMS</li>
                            <li>Visit the My Plans Page in Xstream app to verify status</li>
                            <li>If issue persists, contact: support-airtelxstream@airtel.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq12">
                        Who can use Airtel Xstream Play?
                    </button>
                </h2>
                <div id="faq12" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Anyone who has an Airtel connection (Postpaid, Broadband, DTH, Prepaid) has access to Airtel
                                Xstream Play.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq13">
                        Why are you asking for my mobile number and OTP?
                    </button>
                </h2>
                <div id="faq13" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Airtel Xstream Play is a service which is available only for Airtel users, and hence we need
                                to verify that you are an Airtel user. Once you enter your mobile number we send an OTP to
                                that number to verify
                                that the number is your own. Even DTH, Broadband users may access this service, by entering
                                their Registered mobile numbers associated with their DTH or broadband accounts.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq14">
                        What is Airtel Xstream Play?
                    </button>
                </h2>
                <div id="faq14" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        How do you Login
                        <ul>
                            <li>If you click on any video, if you are not already logged in, you will be asked to login with
                                your mobile number. Alternatively you can login by going to More + Login.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq15">
                        I am not able to play any content. Your website is prompting me to IWatchinappI.
                    </button>
                </h2>
                <div id="faq15" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">

                        <ul>
                            <li>Please follow the following steps:
                                Try using a different browser- Chrome in Android or Windows, Safari in iOS or Mac
                                If you are a broadband or DTH user, please check if you have entered the correct registered
                                number. You can go to More Logout and then login again with the correct number
                                If you are a prepaid user, please check if you are on a recharge greater than Rs. 199
                                If your issue is still not resolved, then contact us at support-airtelxstream@airtel.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq16">
                        Why am I not able to find some movies, tv shows or live tv channels on your website?
                    </button>
                </h2>
                <div id="faq16" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>The website is still a beta product, currently under development. We are adding new features
                                and content every fortnight.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq17">
                        I have a problem with Airtel Xstream Play!
                    </button>
                </h2>
                <div id="faq17" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        The Airtel Xstream Play app is your one-stop destination to access and manage your OTT
                        subscriptions. You can:
                        <ul>
                            <li>Please write to us at support-airtelxstream@airtel.com , and we will resolve it</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq18">
                        What is Airtel Xstream Play?
                    </button>
                </h2>
                <div id="faq18" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Please write to us at support-airtelxstream@airtel.com , and we will resolve it</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq19">
                        How is my information being used?
                    </button>
                </h2>
                <div id="faq19" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Please refer to the Privacy policy (http://static.airtel.tv/privacypolicy.html) and Terms of Use
                        (http://static.airtel.tv/termsofuse.html) for more information on how the information you have
                        shared is being used.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq20">
                        I have some feedback/suggestions for the website.
                    </button>
                </h2>
                <div id="faq20" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        If you have any suggestions or feedback, we welcome you to write directly to the team building this
                        website by going to More + Feedback.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq21">
                        What is Airtel Xstream Entertainment Festival?
                    </button>
                </h2>
                <div id="faq21" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Xstream Entertainment Festival ('Contest') is an opportunity for Participants to stand a chance to
                        win rewards offered by Xtelify ('AirtelXstream')
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq22">
                        Do I need to be an Airtel user to get these Xstream entertainment festival rewards?
                    </button>
                </h2>
                <div id="faq22" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        It applies only to Airtel telecom (Prepaid & Postpaid) active customers.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq23">
                        If I am an Airtel user, what benefit will it get?
                    </button>
                </h2>
                <div id="faq23" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Users will get either FREE Airtel Xstream Play subscription for a limited period Or Discounted to a
                        minimum of 50% or more for 30 day AXP subscription
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq24">
                        Do I get the new reward again if I go to the Xstream Entertainment Festival page?
                    </button>
                </h2>
                <div id="faq24" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Reward, once generated, will not change (No retries)
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq25">
                        If I claim a free Airtel Xstream Play offer or purchase discounted subscription, what will happen
                        post expiry of the benefit?
                    </button>
                </h2>
                <div id="faq25" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ol type="A">
                            <li>If you get discounted Airtel Xstream Play offer ( % discount or Free 1 month offer), the
                                benefit will be discontinued after a defined period.</li>
                            <li>Any subscription will not be auto renewed unless given consent.</li>
                            <li>If you add to bill or auto renew it will be on market price after the end of the defined
                                benefit period.</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq26">
                        I don't have an Airtel Xstream Play app, how to watch free content that I just recieved?
                    </button>
                </h2>
                <div id="faq26" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ol type="A">
                            <li>Get Airtel Xstream Play app on your</li>
                            <li>Smartphones : https://open.airtelxstream.in/GetXstream.</li>
                            <li>Smart TV from play store or app store Or Watch it on your Airtel Xstream TV.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="terms" class="tab-content">
        <div id="terms" class="terms-container">
            <h2 class="terms-title">Airtel Xstream Play Premium</h2>

            <div class="terms-content mt-4">

                <p class="tou__text">
                    <span class="strong">THESE TERMS OF USE ("Agreement")</span> FOR THE APPLICATION ARE A LEGAL AND
                    BINDING AGREEMENT BETWEEN YOU ("you", "your") AND
                    XTELIFY LIMITED (formerly Airtel Digital Limited) ("we", "us", "Airtel/Xstream/Xtelify"). THIS AGREEMENT
                    GOVERNS YOUR USE OF THE
                    APPLICATION AND SERVICES. PLEASE READ THIS AGREEMENT CAREFULLY BEFORE USING THE APPLICATION AND THE
                    SERVICE.
                </p>

                <p class="tou__text">
                    BY REGISTERING ON OR USING THE APPLICATION/SERVICE, YOU (a) ACKNOWLEDGE THAT YOU HAVE READ AND
                    UNDERSTOOD THIS AGREEMENT,
                    (b) REPRESENT THAT YOU COMPLY WITH ALL REQUIREMENTS, AND (c) AGREE TO BE BOUND BY THIS AGREEMENT.
                </p>

                <p class="tou__text">
                    THE APPLICATION AND THE SERVICE MAY BE USED ONLY BY USERS WHO ARE LAWFUL OWNERS OF, OR HAVE
                    AUTHORIZATION TO USE, THE
                    MSISDNs AND DEVICES AND MAKE PAYMENTS, IF ANY. IF YOU DO NOT ACCEPT THE TERMS, DO NOT USE THE
                    APPLICATION.
                </p>

                <p class="tou__text">
                    AIRTEL MAY AMEND THIS AGREEMENT BY POSTING THE UPDATED VERSION ON THE APPLICATION OR
                    <a href="https://www.airtelxstream.in">https://www.airtelxstream.in</a>. CONTINUED USE MEANS ACCEPTANCE
                    OF CHANGES.
                </p>

                <p class="tou__text"><span class="strong">Definitions</span></p>

                <p class="tou__text"><span class="strong">Affiliate(s):</span> Any entity that Controls, is Controlled by,
                    or is under Common Control with another entity.</p>

                <p class="tou__text"><span class="strong">Application:</span> The ‘Airtel Xstream Play’ mobile app
                    including Documentation.</p>

                <p class="tou__text"><span class="strong">Channel(s):</span> Third-party branded channels accessible
                    through the Application.</p>

                <p class="tou__text"><span class="strong">Contaminant:</span> Viruses, worms, trojans, or malicious code.
                </p>

                <p class="tou__text"><span class="strong">Content:</span> All audio/video content made available via the
                    Application.</p>

                <p class="tou__text">
                    <span class="strong">Service</span><br>
                    You must download and install the Application to use the Service. You may browse, search, access,
                    stream, subscribe to Channels, and download Content where permitted. Features and functionalities are
                    subject to Airtel’s discretion.
                </p>

                <p class="tou__text">
                    <span class="strong">Channel & Content</span><br>
                    YOU UNDERSTAND AND AGREE THAT THE APPLICATION ONLY ENABLES USERS TO ACCESS THE CHANNELS AND THAT AIRTEL
                    IS NOT THE AUTHOR OF THE CONTENT AND HAS NO CONTROL OR RIGHT OVER THE CREATION OR THE SUBSTANCE OF THE
                    CONTENT. ALL CONTENT IS CONTROLLED BY THE RESPECTIVE THIRD PARTY OWNERS AND LICENSORS WHO HAVE MADE
                    AVAILABLE THE CONTENT FOR THE CHANNEL.
                </p>

                <p class="tou__text">
                    YOU ACKNOWLEDGE THAT AIRTEL MAY NOT AND IS NOT REQUIRED TO SCREEN, CENSOR OR EDIT ANY PORTION OF THE
                    CONTENT BEFORE PROVIDING ACCESS TO YOU THE USERS. BY USING THE SERVICE, YOU EXPRESSLY ACKNOWLEDGE AND
                    AGREE THAT AIRTEL SHALL NOT BE RESPONSIBLE FOR ANY DAMAGES, CLAIMS OR OTHER LIABILITY ARISING FROM OR
                    RELATED TO YOUR ACCESS, USE OR DOWNLOAD OF ANY CONTENT OR CHANNEL IN ANY MANNER.
                </p>

                <p class="tou__text"><span class="strong">Device:</span> Any supported device on which the Application is
                    used.</p>

                <p class="tou__text"><span class="strong">Documentation:</span> Manuals, instructions, and related
                    information.</p>

                <p class="tou__text"><span class="strong">Financial Information:</span> As defined in Article 10.2.</p>

                <p class="tou__text"><span class="strong">Information:</span> As defined in Article 4.1, includes
                    Financial Information.</p>

                <p class="tou__text"><span class="strong">Marks:</span> Proprietary logos, branding, names, and
                    trademarks.</p>

                <p class="tou__text">
                    <span class="strong">Disclaimers</span>
                </p>

                <p class="tou__text">
                    <span class="strong">Channel & Content</span><br>
                    YOU UNDERSTAND AND AGREE THAT THE APPLICATION ONLY ENABLES USERS TO ACCESS THE CHANNELS AND THAT AIRTEL
                    IS NOT THE AUTHOR OF THE CONTENT AND HAS
                    NO CONTROL OR RIGHT OVER THE CREATION OR THE SUBSTANCE OF THE CONTENT. ALL CONTENT IS CONTROLLED BY THE
                    RESPECTIVE THIRD PARTY OWNERS AND
                    LICENSORS WHO HAVE MADE AVAILABLE THE CONTENT FOR THE CHANNEL.
                </p>

                <p class="tou__text">
                    YOU ACKNOWLEDGE THAT AIRTEL MAY NOT AND IS NOT REQUIRED TO SCREEN, CENSOR OR EDIT ANY PORTION OF THE
                    CONTENT BEFORE PROVIDING ACCESS TO YOU
                    THE USERS. BY USING THE SERVICE, YOU EXPRESSLY ACKNOWLEDGE AND AGREE THAT AIRTEL SHALL NOT BE
                    RESPONSIBLE FOR ANY DAMAGES, CLAIMS OR OTHER
                    LIABILITY ARISING FROM OR RELATED TO YOUR ACCESS, USE OR DOWNLOAD OF ANY CONTENT OR CHANNEL IN ANY
                    MANNER.
                </p>

                <p class="tou__text">
                    YOU FURTHER UNDERSTAND AND AGREE THAT ACCESS TO ALL CONTENT ON THE CHANNELS IS MADE AVAILABLE ON AN
                    'AS-IS' BASIS. AIRTEL DOES NOT PROVIDE ANY
                    REPRESENTATION OR WARRANTY, AND DISCLAIMS ALL REPRESENTATIONS AND WARRANTIES (EXPRESS IMPLIED OR
                    STATUTORY) AND ALL RESPONSIBILITY AND LIABILITY,
                    REGARDING THE CHANNELS AND THEIR RESPECTIVE CONTENT, INCLUDING, WITHOUT LIMITATION, THEIR (a) QUALITY,
                    SUBSTANCE, ACCURACY, RELIABILITY,
                    APPROPRIATENESS OR ANY OTHER STANDARDS, (b) COMPLIANCE WITH APPLICABLE LAWS, RULES, REGULATION AND
                    GUIDELINES, OR (c) TITLE OR
                    NON-INFRINGEMENT OF ANY PARTY'S RIGHTS. AIRTEL HAS NO LIABILITY FOR ANY CHANNEL OR CONTENT YOU FIND TO
                    BE OFFENSIVE, INDECENT, OBJECTIONABLE,
                    SLANDEROUS OR LIBELOUS.
                </p>

                <br>

                <p class="tou__text">
                    <span class="strong">Application & Service</span>
                </p>

                <p class="tou__text">
                    IN ADDITION, YOU EXPRESSLY AGREE THAT THE APPLICATION AND SERVICE ARE PROVIDED ON AN "AS-IS" BASIS AND
                    THE DOWNLOAD, INSTALLATION AND USE OF THE
                    APPLICATION, SERVICE, CHANNELS AND CONTENT IS AT YOUR SOLE RISK. AIRTEL DOES NOT MAKE, AND DISCLAIMS,
                    ANY REPRESENTATIONS OR WARRANTIES, EXPRESS,
                    IMPLIED OR STATUTORY, REGARDING THE SERVICE AND THE APPLICATION, OR ITS MERCHANTABILITY, FITNESS FOR A
                    PARTICULAR PURPOSE, TITLE,
                    NONINFRINGEMENT OF THIRD PARTY RIGHTS, OR ANY WARRANTIES ARISING BY COURSE OF DEALING OR CUSTOM OF
                    TRADE.
                </p>

                <p class="tou__text">
                    AIRTEL MAKES NO REPRESENTATION OR WARRANTY THAT THE MATERIAL DISPLAYED ON OR OFFERED THROUGH THE SERVICE
                    ARE ACCURATE, COMPLETE, APPROPRIATE,
                    RELIABLE, OR TIMELY. AIRTEL ALSO MAKES NO REPRESENTATION OR WARRANTY THAT THE APPLICATION OR THE SERVICE
                    WILL MEET YOUR REQUIREMENTS OR THAT
                    YOUR ACCESS TO AND USE THEREOF WILL BE UNINTERRUPTED OR ERROR-FREE, OR THAT THE APPLICATION WILL BE
                    COMPATIBLE OR INTEROPERABLE WITH ANY
                    USER'S DEVICE.
                </p>


                <p class="tou__text"><span class="strong">MSISDN:</span> The mobile number used for registration.</p>

                <p class="tou__text"><span class="strong">Personally Identifiable Data:</span> Any personal data
                    identifying a User.</p>

                <p class="tou__text"><span class="strong">Privacy Policy:</span> As specified earlier.</p>

                <p class="tou__text"><span class="strong">Proprietary Materials:</span> The Service, Application,
                    Channels, Content, and Marks.</p>

                <p class="tou__text"><span class="strong">Service(s):</span> Video streaming/downloading services provided
                    by Airtel.</p>

                <p class="tou__text"><span class="strong">SNS:</span> As defined in Article 6.1.</p>

                <p class="tou__text"><span class="strong">Unique Identifiers:</span> As defined in Article 5.1.</p>

                <p class="tou__text"><span class="strong">User(s):</span> End users meeting all eligibility, registration,
                    and compliance conditions.</p>

                <p class="tou__text"><span class="strong">User Materials:</span> As defined in Article 3.11(b).</p>

                <p class="tou__text">
                    <span class="strong">Service</span><br>
                    You must download and install the Application to use the Service. You may browse, search, access,
                    stream, subscribe to Channels, and download Content where permitted. Features and functionalities are
                    subject to Airtel’s discretion.
                </p>

                <p class="tou__text">
                    <span class="strong">Channel & Content</span><br>
                    YOU UNDERSTAND AND AGREE THAT THE APPLICATION ONLY ENABLES USERS TO ACCESS THE CHANNELS AND THAT AIRTEL
                    IS NOT THE AUTHOR OF THE CONTENT AND HAS NO CONTROL OR RIGHT OVER THE CREATION OR THE SUBSTANCE OF THE
                    CONTENT.
                </p>

                <p class="tou__text">
                    YOU ACKNOWLEDGE THAT AIRTEL MAY NOT AND IS NOT REQUIRED TO SCREEN, CENSOR OR EDIT ANY CONTENT BEFORE
                    PROVIDING ACCESS.
                </p>

                <p class="tou__text">
                    YOU FURTHER UNDERSTAND AND AGREE THAT ALL CONTENT IS PROVIDED “AS-IS” AND AIRTEL DISCLAIMS ALL
                    WARRANTIES INCLUDING QUALITY, ACCURACY, RELIABILITY, COMPLIANCE, OR NON-INFRINGEMENT.
                </p>

                <br>

                <p class="tou__text"><span class="strong">Application & Service</span></p>

                <p class="tou__text">
                    THE APPLICATION AND SERVICE ARE PROVIDED “AS-IS”. AIRTEL DISCLAIMS ALL WARRANTIES INCLUDING
                    MERCHANTABILITY, FITNESS FOR PURPOSE, AND NON-INFRINGEMENT.
                </p>

                <p class="tou__text">
                    AIRTEL DOES NOT GUARANTEE UNINTERRUPTED SERVICE OR COMPATIBILITY. DEVICE DAMAGE OR DATA LOSS IS NOT
                    AIRTEL’S RESPONSIBILITY.
                </p>

                <p class="tou__text"><span class="strong">Requirements & Restrictions</span></p>

                <p class="tou__text"><span class="strong">Registration:</span> You must provide accurate details including
                    MSISDN, name, email, payment data.</p>

                <p class="tou__text"><span class="strong">Territory:</span> Service available only in India.</p>

                <p class="tou__text"><span class="strong">Age:</span> Must be 18+ to register.</p>

                <p class="tou__text">
                    <span class="strong">Device Compatibility:</span><br>
                    Not supported on:<br>
                    1. LG WebOS<br>
                    2. Roku TV<br>
                    3. Linux systems
                </p>

                <p class="tou__text"><span class="strong">Connectivity:</span> Internet required; charges may apply.</p>

                <p class="tou__text"><span class="strong">Releases:</span> Updates and upgrades are governed by this
                    Agreement.</p>

                <p class="tou__text"><span class="strong">Usage:</span> Personal, non-commercial use only.</p>

                <p class="tou__text"><span class="strong">No Public Exhibition:</span> Public display is prohibited.</p>

                <p class="tou__text"><span class="strong">Dissemination Rules:</span></p>

                <ul class="tou__list">
                    <li>Do not upload harmful, offensive, illegal, or copyrighted material.</li>
                    <li>No impersonation, misleading data, or viruses.</li>
                    <li>No hate speech or threats.</li>
                </ul>

                <p class="tou__text"><span class="strong">Misuse:</span> Any misuse of your account or the Service is
                    prohibited.</p>

                <p class="tou__text"><span class="strong">Technical Restrictions:</span></p>

                <ul class="tou__list">
                    <li>No bots, scraping tools, scripts, automation.</li>
                    <li>No hacking, scanning, or tampering with the Service.</li>
                </ul>

                <p class="tou__text"><span class="strong">Reverse Engineering:</span> Forbidden.</p>

                <p class="tou__text"><span class="strong">Suspension:</span> Airtel may suspend or discontinue the service
                    anytime.</p>

                <p class="tou__text"><span class="strong">Take Down:</span> Content may be removed per law.</p>

                <p class="tou__text"><span class="strong">Loss of Device:</span> You remain liable until Airtel
                    unsubscribes the account.</p>

                <p class="tou__text"><span class="strong">Data & Information:</span> Airtel may collect and use
                    information per Privacy Policy.</p>

                <p class="tou__text">
                    <span class="strong">Limitation of Liability</span>
                </p>

                <p class="tou__text">
                    TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, AIRTEL, ITS LICENSORS, SUPPLIERS, PARTNERS,
                    AFFILIATES OR THIRD-PARTY SERVICE PROVIDERS
                    WILL NOT BE LIABLE TO YOU OR ANY THIRD PARTY, WHETHER UNDER LAW, CONTRACT (INCLUDING FUNDAMENTAL BREACH)
                    OR TORT (INCLUDING NEGLIGENCE),
                    FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, PUNITIVE OR CONSEQUENTIAL DAMAGES, OR FOR ANY
                    LOSS OF PROFITS, REVENUES, DATA,
                    BUSINESS, PRODUCTION OR GOODWILL, OR FOR ANY OTHER FORM OF DAMAGES IN ANY MANNER ARISING OUT OF OR IN
                    CONNECTION WITH THE SERVICES,
                    APPLICATION, CHANNEL, CONTENT OR THIS AGREEMENT, REGARDLESS OF THE FORM OF ACTION OR THE BASIS OF THE
                    CLAIM OR WHETHER OR NOT AIRTEL
                    HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. ALL OTHER DISCLAIMERS AVAILABLE AT www.wynk.in, OR
                    ANY OF THE ASSOCIATED PAGES OR
                    LINKS THEREIN, ARE DEEMED TO BE INCORPORATED HEREIN BY REFERENCE.
                </p>

                <br>

                <p class="tou__text">
                    <span class="strong">Indemnity & Release</span>
                </p>

                <p class="tou__text">
                    You agree to indemnify and hold harmless Airtel, its licensors, service providers, their Affiliates, and
                    each of their employees,
                    officers, directors and agents (together, "Indemnified Parties") against any losses, expenses, costs or
                    damages (including reasonable
                    attorneys' fees, expert fees and other reasonable costs of litigation or proceedings) arising from,
                    incurred as a result of, or in any
                    manner related to any claim or action based upon (a) your breach of, or failure to comply with, the
                    terms and conditions of this Agreement,
                    and including infringement of the copyright or any intellectual property right in the Content,
                    Application or Services, (b) your access
                    and use of the Proprietary Materials, (c) your breach of applicable laws, rules, regulations and
                    guidelines, (d) your negligence and
                    misconduct, (e) your infringement or misappropriation of intellectual property rights of any party, (f)
                    Airtel's execution of any of your
                    instructions, or (g) the use of the Service by any other person using your MSISDN or Device.
                </p>

                <p class="tou__text">
                    To the fullest extent permissible under applicable law, you release and discharge the Indemnified
                    Parties from any liability resulting
                    from your use or possession of the Application, including in relation to the following: (a) any product
                    liability claims, (b) any claim
                    that the Proprietary Materials fail to conform to any applicable legal or regulatory requirement, (c)
                    any claim arising under any consumer
                    protection or similar legislation, and (d) any misuse or unauthorized access of your Airtel account.
                </p>


                <p class="tou__text"><span class="strong">Unique Identifiers:</span> These may be embedded in content
                    metadata.</p>

                <p class="tou__text"><span class="strong">Social Networking Sites:</span></p>

                <ul class="tou__list">
                    <li>Airtel may access SNS profile data when you log in via SNS.</li>
                    <li>Notifications may be posted unless disabled in SNS settings.</li>
                </ul>

                <p class="tou__text"><span class="strong">Advertising:</span> Third-party ads may appear; Airtel is not
                    responsible.</p>

                <p class="tou__text"><span class="strong">Purchased Content:</span> Usage may be restricted by licensing
                    rules.</p>

                <p class="tou__text"><span class="strong">Streaming & Subscription:</span> Streaming-only content cannot
                    be saved or recorded.</p>

                <p class="tou__text">
                    <span class="strong">Payment:</span> You agree to pay applicable charges. Payments are non-refundable
                    except for Airtel-initiated cancellations.
                </p>

                <p class="tou__text"><span class="strong">Auto-renewal:</span> Cancel 48 hrs before renewal.</p>

                <p class="tou__text"><span class="strong">Third-Party Sites:</span> Airtel is not responsible for external
                    websites.</p>

                <p class="tou__text"><span class="strong">Intellectual Property:</span> All rights belong to Airtel or
                    licensors.</p>

                <p class="tou__text"><span class="strong">Termination:</span> Airtel may terminate anytime; you may
                    terminate with 15-day notice.</p>

                <p class="tou__text"><span class="strong">Disclaimers:</span> Content and service are provided “AS-IS”.
                </p>

                <p class="tou__text"><span class="strong">Limitation of Liability:</span></p>

                <ul class="tou__list">
                    <li>No liability for direct or indirect damages.</li>
                    <li>No liability for loss of data, profits, or business.</li>
                </ul>

                <p class="tou__text"><span class="strong">Indemnity:</span> You must indemnify Airtel for misuse,
                    violations, or unauthorized actions.</p>

                <p class="tou__text"><span class="strong">Miscellaneous</span></p>

                <p class="tou__text"><span class="strong">Governing Law:</span> New Delhi courts have jurisdiction.</p>

                <p class="tou__text"><span class="strong">Entire Agreement:</span> This document + Privacy Policy.</p>

                <p class="tou__text"><span class="strong">Severability:</span> Invalid clauses do not affect the rest.</p>

                <p class="tou__text"><span class="strong">No Waiver:</span> Not enforcing a clause does not waive rights.
                </p>

                <p class="tou__text"><span class="strong">Amendments:</span> Airtel may update terms anytime.</p>

                <p class="tou__text"><span class="strong">Assignment:</span> You cannot assign rights. Airtel can.</p>

                <p class="tou__text"><span class="strong">Content Redressal Mechanism</span></p>

                <p class="tou__text">For grievances contact:</p>

                <p class="tou__text">
                    <span class="strong">Grievance Officer:</span> Nitin Grover<br>
                    <span class="strong">Email:</span> Content.Grievance@airtel.com<br>
                    <span class="strong">Address:</span> Airtel Center, Udyog Vihar Phase IV, Gurgaon – 122015
                </p>

                <p class="tou__text"><span class="strong">Airtel Xstream Play – Free Content</span></p>

                <p class="tou__text">
                    Provides movies, TV shows, and 200+ live channels via DistroTV.
                </p>

                <p class="tou__text"><span class="strong">Free Content Includes:</span></p>

                <ul class="tou__list">
                    <li>Movies & TV shows</li>
                    <li>200+ DistroTV live channels</li>
                </ul>

                <p class="tou__text"><span class="strong">Product Construct</span></p>

                <p class="tou__text">
                    Accessible on Android, iOS, browsers, Android TVs, LG WebOS, Samsung Tizen, Firestick, and Apple TV.
                    Content availability depends on partner licensing. Data charges apply.
                </p>

                <p class="tou__text"><span class="strong">Legal Terms & Conditions</span></p>

                <ul class="tou__list">
                    <li><span class="strong">Account Management:</span> You are responsible for your account.</li>
                    <li><span class="strong">Service Changes:</span> Airtel may modify the service anytime.</li>
                    <li><span class="strong">Support:</span> Available via website/app.</li>
                    <li><span class="strong">Usage:</span> Subject to Xtelify’s terms.</li>
                </ul>

            </div>

        </div>

    </div>

    <div id="privacy" class="tab-content">

        <div class="pp-title">Privacy Policy</div>

        <p class="pp-text">
            We at Xtelify (hereinafter mentioned as "Airtel") are committed to protecting our customers'
            Personal Information and shall strive to maintain the privacy of your Personal Information.
            <br><br>
            This Privacy Policy describes the Personal Information which we may collect, and provides our
            approach towards handling and usage of or dealing with the same in compliance with the applicable
            laws and regulations.
            <br><br>
            By using and continuing to use our products and services, you are deemed to have accepted and
            consented to the terms of this Privacy Policy.
        </p>

        <div class="pp-title">Collection of Personal Information</div>

        <p class="pp-text">
            At the time you (a) register on Airtel owned applications ("Software") for using the services,, products and
            materials made available to you using the Software ("Service") or, (b) make any payments related to your use of
            the Service or, (c) download any content made available through the Service ("Content") or, (d) update the
            Software or, (e) share any information through the Software or (f) contact us through our help and support
            channels or, (f) use our services or websites or otherwise interact with us during the course of our
            relationship, we may ask you for your personal information (such as your name, telephone number, address, date
            of birth, credit card details (if required as mode of payment) certain unique identifiers, and any other
            information or data that can be used by itself to uniquely identify, contact, or locate a person, or can be used
            with information available from other sources to uniquely identify an individual ) ("Personal Information"). By
            registering to the Service and/or using the Software / Content, you hereby agree to be bound by the Terms of Use
            and the terms in this privacy policy ("Privacy Policy") We also may automatically receive and track certain data
            about your mobile device (such as your device-type, time-zone, version of the operating system or Software
            currently installed, and language preference) or your activity logs from the use of the Service, Software and
            Content, and we may create a unique device ID for you so we can recognize you. Airtel may collect such
            non-identifiable information forgathering data on what parts of the Service / Software are of most interest to
            Users. In some cases, we may automatically detect your location data, but we will not use it unless you give us
            permission to do so.If you connect with any social networking site ("SNS"), we may also receive some data from
            that network(e.g. your SNS ID, name, profile picture, gender, age, locale and email address), which shall be
            deemed to be included within the meaning of your Personal Information. In case you do not provide your
            information or consent for usage of Personal Information or later on withdraw your consent for usage of the
            Personal Information so collected, Airtel reserves the right to discontinue the services for which the said
            information was sought.
        </p>

        <p class="pp-text">
            Your Personal Information may be collected by Airtel or its authorized third parties (sub-contractors,
            consultants, processors, etc.).
        </p>

        <div class="pp-title">Use of Personal Information</div>

        <p class="pp-text">Your Personal Information may be used for the following purposes:</p>

        <ul class="pp-list">
            <li>to identify and validate your use of Services,</li>
            <li>to complete transactions and billing,</li>
            <li>to provide customized content and advertising,</li>
            <li>to resolve customer support issues,</li>
            <li>to track partner app traffic,</li>
            <li>to ensure technical functioning,</li>
            <li>to improve our products and services,</li>
            <li>to enforce Terms of Use,</li>
            <li>to comply with legal obligations,</li>
            <li>to conduct surveys and analytics,</li>
            <li>to share with Airtel group companies,</li>
            <li>to market and promote products/services.</li>
        </ul>

        <p class="pp-text">
            We may aggregate and encrypt your data to generate insights and statistics.
        </p>

        <p class="pp-text">
            We may also collect information such as call details, browsing history, and additional data required
            while using our services.
        </p>

        <p class="pp-text">
            We may share your Personal Information internally among group entities.
        </p>

        <p class="pp-text pp-strong">You sharing data with third parties</p>

        <p class="pp-text">
            Third-party apps/advertisers may require your Personal Information to offer services. Any data given
            to them is governed by their own privacy policies.
        </p>

        <p class="pp-text pp-strong">Sharing with social networks</p>

        <p class="pp-text">
            If you use an SNS login, Airtel may auto-share your activity and allow posting on your SNS profile.
            Airtel may store access tokens for authentication.

            Airtel may provide your Personal Information or any portion of it to Airtel's strategic partners that work with
            Airtel to provide products and services, or that help Airtel market its products and services to customers. You
            further acknowledge that Airtel may be required under law, legal process, litigation,and/or requests from public
            and governmental authorities to disclose your Personal Information.
            As a part of your use of our products and services and subject to applicable laws, the information and personal
            data you provide to us may be transferred to countries other than India. This may happen if any of our servers
            are from time to time located in a country other than India, or one of our service providers is located in a
            country other than India. By submitting your information and personal data to us, you agree to the transfer,
            storage, and/or processing of such information and personal data outside India in the manner described above.
            Further, Airtel payment processing partners /gateways may access you billing and shipping information (including
            your credit cards details, balance in your Airtel account, etc.) in relation to any payments that you make for
            using the Service. You agree that such third party partners of Airtel may receive such information directly from
            you. Such third parties' access and protection of your Personal Information will be in accordance with their
            privacy and security policies and Airtel will not be liable for the same in anyway.
        </p>

        <p class="pp-text pp-strong">Airtel sharing data with third parties</p>

        <p class="pp-text">
            Airtel may provide Personal Information to strategic partners to provide or market services. Airtel
            may also be legally required to disclose your data.
            <br><br>
            Your data may be transferred internationally depending on server locations and service providers.
        </p>

        <p class="pp-text">
            Payment gateway partners may receive billing details directly from you. Airtel is not responsible
            for third-party privacy and security practices.
        </p>

        <p class="pp-text pp-strong">Links to other websites</p>

        <p class="pp-text">
            We may display links to third-party websites. Their privacy policies govern your use.
        </p>

        <p class="pp-text pp-strong">Use of Cookies</p>

        <p class="pp-text">
            Airtel uses cookies and beacons for personalization and analytics. You may disable cookies.
        </p>

        <p class="pp-text pp-strong">Security</p>

        <p class="pp-text">
            Airtel uses industry-standard security measures, firewalls, secure servers, and monitoring systems.
            However, no system is 100% secure against breaches, hacking, malware, or force majeure events.
        </p>

        <p class="pp-text pp-strong">Choice</p>

        <p class="pp-text">
            You may disable features that require sharing Personal Information.
        </p>

        <p class="pp-text pp-strong">Changes to Privacy Policy</p>

        <p class="pp-text">
            Airtel may update this Privacy Policy at any time. Changes will be posted here.
        </p>

        <p class="pp-text pp-strong">Feedback and Concerns</p>

        <p class="pp-text">
            If you have feedback or concerns, contact us
            <a href="https://www.airtelxstream.in/more/help/contentfeedback">here</a>.
        </p>

        <p class="pp-text">
            <span class="pp-strong">Name:</span> Nitin Grover<br>
            <span class="pp-strong">Email:</span> ADLGrievance.Officer@airtel.com
        </p>

        <p class="pp-text pp-strong">
            <a href="https://www.airtelxstream.in/more/help/xstreampremium">About Xstream Premium</a>
        </p>

    </div>

    <div id="subscription" class="tab-content">

        <div class="sub-title">About Airtel Xstream Play</div>

        <p class="sub-text">
            Airtel Xstream is an envelope of channels offered by Xtelify Limited ("Airtel") with content from
            multiple partners such as SonyLiv, Eros Now, Manorama Max, Hoichoi, Namma Flix, Shemaroo, Ultra and more.
            The list of partners updates from time to time at Airtel’s sole discretion.
            <br><br>
            Customers can subscribe to listed packs via the Airtel Xstream application or website by paying the
            applicable charges. Some channels may be available for free at Airtel’s discretion.
        </p>

        <div class="sub-title">Airtel Xstream Play Packs</div>

        <div class="sub-title">Airtel Xstream Premium Pack</div>

        <p class="sub-text">
            This subscription gives users access to a bundle of partner channels ("AirtelXstreamPlayPremiumPack").
            Airtel may modify the list of included partners anytime at its sole discretion.
        </p>

        <table class="sub-table">
            <tr>
                <th>Pack Title</th>
                <td>Airtel Xstream Play Premium Pack</td>
            </tr>
            <tr>
                <th>Plans</th>
                <td>
                    Rs 149 for 30 days<br>
                    Rs 399 for 90 days<br>
                    Rs 1499 for 365 days
                </td>
            </tr>
            <tr>
                <th>Concurrent Screens</th>
                <td>2 screens allowed</td>
            </tr>
            <tr>
                <th>Platforms</th>
                <td>
                    1. Airtel Xstream Box<br>
                    2. Large Screen (Android TV / Apple TV / WebOS / Tizen / Vidaa)<br>
                    3. Desktop (www.airtelxstream.in)<br>
                    4. Mobile App & Website (Android, iOS)
                </td>
            </tr>
            <tr>
                <th>Channels of Sale</th>
                <td>
                    1. Airtel Xstream App & Website<br>
                    2. Airtel Xstream Box<br>
                    3. Shop Category – Airtel Thanks App
                </td>
            </tr>
            <tr>
                <th>Included Channels*</th>
                <td>
                    LionsgatePlay, SonyLiv, Aha, Chaupal, ALTT, Playflix, Hoichoi, Manorama,
                    ErosNow, Ultra, ShemarooMe, Nammaflix, Hungama, Docubay, Klikk, Raj Digital,
                    Epicon, ShortsTV, DollywoodPlay, SunNxt
                    <br><br>
                    * SonyLIV not available on MI TV stick and Chromecast<br>
                    * LionsgatePlay not available on Fire TV
                </td>
            </tr>
        </table>

        <p class="sub-text center">
            *Subject to modification or substitution at Airtel's discretion.
        </p>

        <div class="sub-title">25+ OTT @ Rs 279</div>

        <p class="sub-text">
            This pack includes subscriptions for Netflix, JioHotstar, Zee5 and Airtel Xstream Play Premium.
            Airtel may modify partners anytime.
        </p>

        <table class="sub-table">
            <tr>
                <th>Pack Title</th>
                <td>25+ OTT</td>
            </tr>
            <tr>
                <th>Plan</th>
                <td>Monthly – Rs 279</td>
            </tr>
            <tr>
                <th>Platforms</th>
                <td>
                    Airtel Xstream Box – Netflix, Hotstar, Xstream App<br>
                    Large Screen (Android TV, Apple TV, WebOS, Tizen, Vidaa)<br>
                    Desktop: airtelxstream.in, netflix.com, hotstar.com<br>
                    Mobile Apps (Android, iOS)
                </td>
            </tr>
            <tr>
                <th>Included Subscriptions</th>
                <td>
                    Netflix Basic<br>
                    JioHotstar Super<br>
                    Zee5 Premium<br>
                    Airtel Xstream Play Premium Pack
                </td>
            </tr>
            <tr>
                <th>Screens</th>
                <td>
                    Netflix – 1<br>
                    Hotstar – 2<br>
                    Zee5 – 2<br>
                    Xstream – 2
                </td>
            </tr>
            <tr>
                <th>Resolution</th>
                <td>
                    Netflix – HD<br>
                    Hotstar – FHD<br>
                    Zee5 – FHD<br>
                    Xstream – varies by partner (Minimum HD)
                </td>
            </tr>
        </table>

        <p class="sub-text">
            *Subject to modification or substitution at Airtel's discretion.
        </p>

        <div class="sub-title">Terms & Conditions</div>

        <ul class="sub-list">
            <li>1. Packs are available only in India.</li>
            <li>2. Prices are as listed above.</li>
            <li>3. To claim OTT benefits, follow app instructions.</li>
            <li>4. Packs work independently from existing subscriptions.</li>
            <li>5. Premium Pack does not allow watching content on partner apps directly.</li>
            <li>6. Validity depends on the plan purchased.</li>
            <li>7. Partner list may change anytime.</li>
            <li>8. Add-to-bill option will auto-renew monthly unless cancelled.</li>
            <li>9. Auto-renewal applies unless cancelled by user.</li>
            <li>10. Benefits run parallel with existing subscriptions.</li>
            <li>11. Benefits are non-transferable.</li>
            <li>12. Airtel not liable for partner content issues.</li>
            <li>13. Airtel may modify Terms anytime.</li>
            <li>14. Changes will be posted on the website.</li>
            <li>15. Airtel may discontinue or modify packs anytime.</li>
            <li>16. All disputes subject to New Delhi jurisdiction.</li>
            <li>17. Airtel not liable for damages exceeding last paid fee.</li>
            <li>18. Refunds available via support-airtelxstream@airtel.com.</li>
            <li>19. By subscribing, Customer accepts all terms.</li>
        </ul>

    </div>

    <div id="feedback" class="tab-content">

        <h3 class="fb-title">Content Redressal Mechanism</h3>

        <p class="fb-text">
            If you have any grievance or concerns with respect to any content available on Xtelify,
            please write to our Grievance Officer at the below mentioned email ID.
        </p>

        <h3 class="fb-title">Grievance Officer</h3>

        <p class="fb-text"><span class="fb-strong">Name:</span> Mr. Nitin Grover</p>
        <p class="fb-text"><span class="fb-strong">Email:</span> Content.Grievance@airtel.com</p>
        <p class="fb-text">
            <span class="fb-strong">Address:</span> Airtel Center, Plot No. 16, Udyog Vihar Phase IV, Gurgaon - 122015
        </p>

        <p class="fb-text">In order to enable us to efficiently address your grievance/complaint, please include:</p>

        <ol class="fb-list">
            <li>Title of the Content</li>
            <li>Description and nature of complaint</li>
            <li>Date and Time (if any)</li>
            <li>Your name and contact details</li>
        </ol>

        <p class="fb-text">
            <span class="fb-strong">PLEASE NOTE:</span>
            In absence of any of the above details, Xtelify shall not be able to take cognizance of the complaint.
            Xtelify does not warrant that any content you find objectionable will be taken down or remedied to your
            satisfaction. All complaints will be disposed as per timelines specified under the Information Technology
            (Intermediary Guidelines and Digital Media Ethics Code) Rules, 2021.
        </p>

        <h3 class="fb-title">Content Grievance Redressal Report – Last Updated on 4 July, 2025</h3>

        <!-- FULL TABLE START -->
        <table class="fb-table" aria-label="Grievances Summary by Month and Year">

            <caption style="margin-left: 170px;">Monthly Grievance Summary (2023–2025)</caption>

            <thead>
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Grievances Received</th>
                    <th>Acknowledgment Sent</th>
                    <th>Response Sent</th>
                </tr>
            </thead>

            <tbody>

                <!-- YEAR 2023 -->
                <tr>
                    <td rowspan="12">2023</td>
                    <td>Jan-23</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Feb-23</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Mar-23</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Apr-23</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>May-23</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Jun-23</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Jul-23</td>
                    <td>7</td>
                    <td>7</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>Aug-23</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Sep-23</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Oct-23</td>
                    <td>11</td>
                    <td>11</td>
                    <td>11</td>
                </tr>
                <tr>
                    <td>Nov-23</td>
                    <td>12</td>
                    <td>12</td>
                    <td>12</td>
                </tr>
                <tr>
                    <td>Dec-23</td>
                    <td>14</td>
                    <td>14</td>
                    <td>14</td>
                </tr>

                <tr>
                    <td colspan="2"><strong>Grand Total</strong></td>
                    <td><strong>55</strong></td>
                    <td><strong>55</strong></td>
                    <td><strong>55</strong></td>
                </tr>

                <!-- YEAR 2024 -->
                <tr>
                    <td rowspan="11">2024</td>
                    <td>Jan-24</td>
                    <td>16</td>
                    <td>16</td>
                    <td>16</td>
                </tr>
                <tr>
                    <td>Feb-24</td>
                    <td>11</td>
                    <td>11</td>
                    <td>11</td>
                </tr>
                <tr>
                    <td>Mar-24 till 12-Mar-24</td>
                    <td>17</td>
                    <td>17</td>
                    <td>17</td>
                </tr>
                <tr>
                    <td>May-24</td>
                    <td>10</td>
                    <td>10</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>Jun-24</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Jul-24</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Aug-24</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Sep-24</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Oct-24</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Nov-24</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>Dec-24</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>

                <tr>
                    <td colspan="2"><strong>Grand Total</strong></td>
                    <td><strong>66</strong></td>
                    <td><strong>66</strong></td>
                    <td><strong>66</strong></td>
                </tr>

                <!-- YEAR 2025 -->
                <tr>
                    <td rowspan="5">2025</td>
                    <td>Jan-25</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Feb-25</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Mar-25</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>April-25</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>May-25</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>

            </tbody>

            <tfoot>
                <tr>
                    <td colspan="2"><strong>Grand Total</strong></td>
                    <td><strong>0</strong></td>
                    <td><strong>0</strong></td>
                    <td><strong>0</strong></td>
                </tr>
            </tfoot>

        </table>
        <!-- FULL TABLE END -->

    </div>

    <script>
        const tabs = document.querySelectorAll('.custom-tabs .tab');
        const contents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {

                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));

                // Add active on clicked tab
                tab.classList.add('active');

                // Hide all content
                contents.forEach(c => c.classList.remove('active'));

                // Show matched content
                const target = tab.getAttribute('data-target');
                document.getElementById(target).classList.add('active');
            });
        });
    </script>

@endsection
