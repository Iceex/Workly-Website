<?php
/**
 * Workly - Virtual Assistant Data Store
 * File: /php/data/vas.php
 *
 * This file contains the structured catalog of the 10 pre-vetted Virtual Assistants.
 * To add, edit, or remove VAs, simply modify this array.
 */

$virtualAssistants = [
    [
        'id' => 'va-1',
        'slug' => 'lariany-pico',
        'name' => 'Lariany Pico',
        'role' => 'Virtual Assistant & Administrative Support Specialist',
        'category' => 'Administrative',
        'secondaryRoles' => ['Marketing', 'Healthcare', 'Management'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 18,
        'rating' => 4.9,
        'reviewCount' => 28,
        'experienceYears' => 7,
        'languages' => ['Spanish', 'English'],
        'timezone' => 'GMT-3',
        'avatar' => '/assets/va/lariany/lari-profile.webp',
        'tagline' => 'Reliable Virtual Assistant specializing in administrative operations, customer support, appointment setting, and CRM management.',
        'shortBio' => 'Detail-oriented Virtual Assistant with 7 years of experience in administrative support, customer service, finance operations, and appointment setting. Skilled at managing daily operations, maintaining organized workflows, and delivering professional customer experiences across multiple industries.',
        'fullBio' => 'I am a dedicated Virtual Assistant with approximately 7 years of professional experience supporting administrative operations, customer service, finance processes, and business development activities. My background includes working with marketing agencies, healthcare practices, promotional products companies, and independent businesses. I have hands-on experience managing calendars, coordinating appointments, handling customer inquiries, processing purchase orders, supporting supplier payments, managing billing and accounts receivable, following up on outstanding balances, and maintaining accurate customer records. I also specialize in appointment setting and lead management, including outbound communication, lead follow-ups, CRM updates, appointment confirmations, and coordination between prospects and internal teams. Throughout my experience, I have worked with different teams and business owners to keep daily operations organized, improve communication, and ensure tasks are completed consistently. I am comfortable working remotely, adapting to different business processes, following established procedures, and managing multiple responsibilities with attention to detail. My goal is to help businesses save time, maintain efficient operations, and provide dependable administrative and customer support.',
        'keyResponsibilities' => [
            'Manage administrative tasks, business documentation, data entry, and digital records with accuracy and attention to detail.',
            'Coordinate appointments, manage calendars, schedule meetings, and handle appointment confirmations and rescheduling.',
            'Provide professional customer service through phone calls, email, and text messaging, addressing inquiries and following up with customers.',
            'Manage CRM activities, update lead records, track opportunities, and maintain consistent follow-up communication.',
            'Support appointment-setting operations, including outbound calls, lead nurturing, objection handling, and appointment coordination.',
            'Assist with financial and administrative processes, including purchase orders, supplier payments, billing, accounts receivable, collections, and credit applications.',
            'Coordinate with internal teams, healthcare offices, and business partners to maintain organized workflows and ensure timely task completion.'
        ],
        'whyTheyExcel' => [
            'Versatile industry experience: Background in marketing agencies, healthcare practices, customer service, finance, and general administration.',
            'Strong organizational skills: Experienced in managing multiple priorities, calendars, customer records, and administrative workflows in remote environments.',
            'Customer-focused communication: Able to handle customer inquiries, follow-ups, appointment coordination, and sensitive conversations with professionalism and empathy.',
            'Operational reliability: Comfortable following SOPs, maintaining accurate information, tracking pending tasks, and coordinating with different departments.',
            'Adaptability and problem-solving: Quick to understand new processes, work with different CRM platforms, and adjust to changing business requirements.'
        ],
        'tools' => [
            'Follow Up Boss',
            'GoHighLevel',
            'Salesforce',
            'Monday.com',
            'Google Sheets',
            'Google Calendar',
            'Microsoft Outlook',
            'Calendly',
            'Zoom',
            'Google Chat',
            'GMass',
            'CRM Platforms',
            'Microsoft Office'
        ],
        'videoInfo' => [
            'videoUrl' => '/assets/video/297986_medium.mp4',
            'title' => 'Meet Lariany – Virtual Assistant & Administrative Support Specialist',
            'duration' => '02:00',
            'status' => 'pending_embed',
            'placeholderPoster' => '/assets/va/lariany/lari-profile.webp',
            'topicsCovered' => [
                'Administrative Support and Customer Service',
                'CRM Management and Appointment Setting',
                'Remote Operations and Business Coordination'
            ]
        ],
        'reviews' => [
            [
                'clientName' => 'Emily Carter',
                'clientRole' => 'Operations Manager',
                'company' => 'BrightPath Business Solutions',
                'rating' => 5.0,
                'date' => '2026-08-15',
                'comment' => 'Lariany is highly organized, dependable, and proactive. She handles administrative tasks and scheduling efficiently, allowing our team to focus on other priorities. Her attention to detail and communication make her a valuable support professional.'
            ],
            [
                'clientName' => 'Michael Thompson',
                'clientRole' => 'Healthcare Practice Manager',
                'company' => 'CarePoint Medical Group',
                'rating' => 4.9,
                'date' => '2026-09-10',
                'comment' => 'Excellent communication and customer service skills. Lariany understands the importance of patient follow-ups, appointment coordination, and keeping CRM records updated. She is professional, consistent, and attentive to detail.'
            ],
            [
                'clientName' => 'Sarah Mitchell',
                'clientRole' => 'Marketing Director',
                'company' => 'GrowthBridge Marketing',
                'rating' => 5.0,
                'date' => '2026-10-05',
                'comment' => 'A reliable team player with strong administrative and lead management skills. Lariany adapts quickly to new processes, follows instructions carefully, and maintains consistent communication. Her support makes daily operations much smoother.'
            ]
        ],
        'featured' => true
    ],
    [
        'id' => 'va-2',
        'slug' => 'jose-villegas',
        'name' => 'Jose Villegas',
        'role' => 'Bilingual Legal Virtual Assistant',
        'category' => 'Legal',
        'secondaryRoles' => ['Administrative', 'Insurance'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 18,
        'rating' => 4.9,
        'reviewCount' => 28,
        'experienceYears' => 5,
        'languages' => ['Spanish', 'English'],
        'timezone' => 'America/Denver',
        'avatar' => 'https://i.pravatar.cc/400?img=52',
        'tagline' => 'Bilingual virtual assistant with 5+ years of experience supporting legal teams and business operations.',
        'shortBio' => 'Bilingual Legal Virtual Assistant with over 5 years of experience in administrative support, legal case coordination, and customer service. Skilled in Spanish-English communication, case management systems, document organization, and operational workflows.',
        'fullBio' => 'Jose Villegas is a bilingual Virtual Assistant with over 5 years of professional experience supporting legal teams and businesses across legal, real estate, and medical environments. His background includes client intake, legal administrative assistance, case management support, bilingual communication, and customer service. He has experience communicating with clients, insurance adjusters, insurance companies, police departments, and courts, as well as preparing case summaries, translating information between Spanish and English, and maintaining organized case records. He has hands-on experience with Filevine, SmartAdvocate, and MyCase, supporting case-related workflows and administrative tasks. His additional experience in customer support and business operations includes product research, quote preparation, order entry, purchase order coordination, supplier communication, and account organization. He has also worked with SAGE, HighSpot, and Canva in promotional product and business support workflows. Jose combines clear communication, attention to detail, adaptability, and a practical approach to helping teams stay organized and focused on their priorities.',
        'keyResponsibilities' => [
            'Manage client intake, collect relevant information, and maintain organized client records.',
            'Provide bilingual communication and Spanish-English translation support for clients and legal teams.',
            'Assist with legal case management, case summaries, document organization, and administrative follow-ups.',
            'Communicate with insurance adjusters, insurance companies, police departments, and courts as required.',
            'Update and organize case information using legal case management platforms such as Filevine, SmartAdvocate, and MyCase.',
            'Support daily business operations through customer service, product research, quote preparation, order entry, and purchase order coordination.',
            'Coordinate administrative follow-ups, supplier communications, and account documentation to keep workflows organized.'
        ],
        'whyTheyExcel' => [
            'Bilingual communication: Able to assist English- and Spanish-speaking clients and support accurate communication between both languages.',
            'Legal administrative experience: More than 5 years of professional experience, including client intake, case coordination, legal support, and communication with insurance companies and other institutions.',
            'Practical software experience: Hands-on experience with Filevine, SmartAdvocate, and MyCase, including familiarity with their case management workflows.',
            'Versatile business support: Experience across legal assistance, customer service, promotional product operations, order entry, and supplier coordination.',
            'Organized and adaptable: Comfortable managing administrative details, following up on pending tasks, and supporting different teams and business needs.'
        ],
        'tools' => [
            'Filevine',
            'SmartAdvocate',
            'MyCase',
            'SAGE / SAGE Workplace',
            'HighSpot',
            'Canva'
        ],
        'videoInfo' => [
            'videoUrl' => '/assets/video/297986_medium.mp4',
            'title' => 'Meet Jose Villegas – Bilingual Legal Virtual Assistant',
            'duration' => '02:00',
            'status' => 'pending_embed',
            'placeholderPoster' => 'https://i.pravatar.cc/400?img=52',
            'topicsCovered' => [
                'Legal administrative support and case management experience',
                'Bilingual client communication and Spanish-English translation',
                'Business operations, customer service, and administrative organization'
            ]
        ],
        'reviews' => [
            [
                'clientName' => 'Alex Morgan',
                'clientRole' => 'Managing Attorney',
                'company' => 'Sample Legal Services',
                'rating' => 5.0,
                'date' => '2026-09-15',
                'comment' => 'Demo review: Jose provided reliable administrative support and helped keep client information and case-related tasks organized. His bilingual communication skills were particularly helpful when assisting Spanish-speaking clients.'
            ],
            [
                'clientName' => 'Sarah Thompson',
                'clientRole' => 'Operations Manager',
                'company' => 'Northstar Business Solutions',
                'rating' => 4.9,
                'date' => '2026-08-20',
                'comment' => 'Demo review: Jose was organized, responsive, and attentive to detail. He handled administrative requests, customer communication, and follow-ups while keeping daily workflows moving smoothly.'
            ],
            [
                'clientName' => 'Michael Reed',
                'clientRole' => 'Case Management Supervisor',
                'company' => 'Pinnacle Client Support',
                'rating' => 4.9,
                'date' => '2026-07-10',
                'comment' => 'Demo review: Jose demonstrated strong communication and follow-through. His experience with legal support tasks and case management platforms made him a valuable addition to the administrative workflow.'
            ]
        ],
        'featured' => true
    ],
    [
        'id' => 'va-3',
        'slug' => 'jose-david-urbina',
        'name' => 'Jose David Urbina',
        'role' => 'Salesforce Administrator & Operations Virtual Assistant',
        'category' => 'Administrative',
        'secondaryRoles' => ['Legal', 'Management'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 18,
        'rating' => 4.9,
        'reviewCount' => 28,
        'experienceYears' => 0.75,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'Europe/Madrid',
        'avatar' => 'https://i.pravatar.cc/400?img=54',
        'tagline' => 'Streamlining business operations through Salesforce automation, CRM management, and reliable administrative support.',
        'shortBio' => 'Salesforce Administrator and Virtual Assistant with hands-on experience in CRM customization, workflow automation, technical troubleshooting, and business operations. I help real estate and service-based businesses optimize their processes, coordinate daily activities, and maintain efficient systems that support their teams.',
        'fullBio' => 'I am a tech-focused Virtual Assistant specializing in Salesforce administration, workflow automation, and business operations support. My experience combines technical CRM management with hands-on administrative coordination, allowing me to help businesses improve their internal processes while keeping everyday operations organized and efficient.
In the real estate industry, I work with Salesforce to manage and customize business processes across acquisitions, inventory, dispositions, and transaction coordination. My responsibilities include building and maintaining Salesforce Flows, configuring custom objects and fields, creating automated task reminders, managing record relationships, troubleshooting system issues, and supporting integrations with external platforms.
I also work with Zapier to automate data transfers, connect business applications, troubleshoot integrations, and reduce repetitive administrative work. My technical responsibilities include maintaining CRM data quality, investigating duplicate records, supporting lead management processes, managing user access configurations, and improving activity tracking and reporting.
Beyond CRM administration, I have practical experience in customer service and operational coordination for service-based businesses. This includes communicating with customers, coordinating appointments and service schedules, supporting team members, preparing estimates, following up on service requests, and helping resolve operational issues.
I am also experienced in communicating with vendors, requesting and reviewing quotations, coordinating product proofs and order updates, tracking shipments, and maintaining professional communication throughout the purchasing process.
My approach combines technical problem-solving with clear communication, attention to detail, and an understanding of how business teams operate. I focus on creating practical solutions that reduce manual work, improve organization, and help businesses deliver a more consistent experience to their customers.
I am particularly well suited for companies seeking a Virtual Assistant who can take ownership of CRM administration, support operational workflows, troubleshoot technical issues, and communicate effectively with both internal teams and external clients.',
        'keyResponsibilities' => [
            'Administer and customize Salesforce CRM, including custom objects, fields, page layouts, record types, permissions, and data relationships.',
            'Build, test, and maintain Salesforce Flows and Zapier automations for task creation, reminders, record updates, and operational workflows.',
            'Troubleshoot CRM issues, investigate duplicate records, maintain data accuracy, and support integrations between Salesforce and external applications.',
            'Support real estate acquisitions, inventory, dispositions, and transaction coordination through organized CRM workflows, reporting, and task management.',
            'Manage customer communications, appointment coordination, scheduling updates, service requests, and administrative follow-ups.',
            'Coordinate with vendors and suppliers to obtain quotations, review product proofs, communicate order requirements, and track deliveries.',
            'Assist internal teams with technical support, process documentation, onboarding coordination, and improvements to daily operational procedures.'
        ],
        'whyTheyExcel' => [
            'Hands-on Salesforce expertise: Practical experience configuring CRM structures, building record-triggered automations, maintaining data relationships, and troubleshooting real operational challenges.',
            'Technical and operational versatility: Combines CRM administration and automation with customer support, vendor coordination, scheduling, and business process management.',
            'Process improvement mindset: Identifies repetitive tasks, investigates workflow inefficiencies, and implements practical automations to improve consistency and reduce manual effort.',
            'Cross-functional communication: Experienced in coordinating with management, sales teams, transaction coordinators, service professionals, customers, and external suppliers.',
            'Detail-oriented problem solving: Comfortable investigating technical issues, reviewing field mappings, testing automation behavior, and following problems through to resolution.'
        ],
        'tools' => [
            'Salesforce CRM',
            'Salesforce Flow Builder',
            'Salesforce Reports & Dashboards',
            'Salesforce Data Loader',
            'Salesforce Custom Objects & Fields',
            'Salesforce User Permissions',
            'Zapier',
            'Zapier Webhooks',
            'Code by Zapier',
            'SmrtPhone',
            'Google Calendar',
            'Gmail',
            'Google Sheets',
            'Slack'
        ],
        'videoInfo' => [
            'videoUrl' => '/assets/video/297986_medium.mp4',
            'title' => 'Meet Jose David | Salesforce Administration & Business Operations',
            'duration' => '02:05',
            'status' => 'pending_embed',
            'placeholderPoster' => 'https://i.pravatar.cc/400?img=54',
            'topicsCovered' => [
                'Salesforce CRM administration and workflow automation',
                'Business operations and administrative support',
                'CRM integrations, troubleshooting, and process optimization'
            ]
        ],
        'reviews' => [
            [
                'clientName' => 'Michael Thompson',
                'clientRole' => 'Operations Director',
                'company' => 'Summit Property Solutions',
                'rating' => 5.0,
                'date' => '2026-09-18',
                'comment' => 'Jose has a great understanding of how CRM systems connect with day-to-day operations. He helped us organize Salesforce workflows, improve task tracking, and troubleshoot issues that were slowing down our team. He communicates clearly and takes a thoughtful approach to solving problems.'
            ],
            [
                'clientName' => 'Sarah Mitchell',
                'clientRole' => 'Customer Experience Manager',
                'company' => 'BrightSide Home Services',
                'rating' => 4.9,
                'date' => '2026-08-12',
                'comment' => 'Jose brings a valuable combination of technical skills and customer service experience. He is organized, responsive, and comfortable handling scheduling changes, customer communication, and unexpected operational challenges. His attention to detail makes him a dependable part of any support team.'
            ],
            [
                'clientName' => 'Daniel Brooks',
                'clientRole' => 'Business Operations Manager',
                'company' => 'Northstar Business Group',
                'rating' => 5.0,
                'date' => '2026-10-07',
                'comment' => 'What stands out about Jose is his ability to understand a business process and find practical ways to improve it. Whether working on Salesforce automation, coordinating with vendors, or resolving system issues, he approaches each task carefully and keeps everyone informed throughout the process.'
            ]
        ],
        'featured' => true
    ],
[
    'id' => 'va-4',
    'slug' => 'pedro-medina',
    'name' => 'Pedro Medina',
    'role' => 'Bilingual Personal Injury Case Manager & Virtual Assistant',
    'category' => 'Legal',
    'secondaryRoles' => ['Administrative', 'Management', 'Marketing'],
    'availability' => 'Full-time',
    'hoursPerWeek' => 40,
    'hourlyRate' => 18,
    'rating' => 4.9,
    'reviewCount' => 32,
    'experienceYears' => 4,
    'languages' => ['Spanish', 'English'],
    'timezone' => 'Europe/Madrid',
    'avatar' => '/assets/va/pedro-medina/pedro-profile.webp',
    'tagline' => 'Bilingual Legal Operations Specialist helping personal injury firms streamline case management, client communication, and lead generation.',
    'shortBio' => 'Bilingual Virtual Assistant and Personal Injury Case Manager with over 4 years of experience supporting U.S.-based businesses and law firms. Skilled in case management, client communication, medical records coordination, insurance claims, intake operations, and administrative support.',
    'fullBio' => 'Pedro Medina is a bilingual English-Spanish Virtual Assistant and Personal Injury Case Manager with over 4 years of experience supporting U.S.-based businesses, law firms, and service providers. He has hands-on experience working with personal injury attorneys, assisting with case management operations, coordinating medical records and billing requests, communicating with clients and insurance adjusters, and preparing documentation for settlement demands. His experience includes requesting medical records and bills, reviewing medical ledgers, coordinating provider communications, handling insurance claims, reviewing declarations pages, identifying PIP, MedPay, and UM/UIM coverage, and assisting with demand preparation. Pedro also has experience in lead generation, appointment setting, cold calling, cold outreach, CRM management, and intake operations. His bilingual communication skills allow him to support both English- and Spanish-speaking clients while helping businesses improve their operational efficiency and customer experience. He is familiar with multiple business and legal software platforms and understands the importance of accuracy, organization, responsiveness, and confidentiality when supporting professional teams.',
    'keyResponsibilities' => [
        'Manage personal injury cases and assist attorneys with day-to-day case management operations.',
        'Request, follow up on, and organize medical records, billing statements, affidavits, and other supporting documentation.',
        'Review medical bills, payment histories, adjustments, outstanding balances, and treatment records.',
        'Assist with preparing settlement demand packages, reviewing accident reports, and organizing case documentation.',
        'Communicate with clients, healthcare providers, insurance adjusters, and attorneys in English and Spanish.',
        'Assist with insurance claims, including third-party liability, PIP, MedPay, and UM/UIM coverage coordination.',
        'Perform lead generation, cold calling, cold outreach, appointment setting, and CRM management.'
    ],
    'whyTheyExcel' => [
        'Bilingual Communication: Able to communicate professionally with English- and Spanish-speaking clients, providers, and business partners.',
        'Personal Injury Experience: Practical experience supporting U.S. personal injury law firms with case management, medical documentation, insurance coordination, and demand preparation.',
        'Attention to Detail: Experienced in reviewing medical bills, identifying discrepancies, organizing case files, and tracking outstanding documentation.',
        'Versatile Business Support: Combines legal administrative experience with lead generation, cold outreach, appointment setting, and client intake operations.',
        'Adaptability: Familiar with multiple CRM, case management, communication, and automation platforms, allowing him to adapt to different business workflows.'
    ],
    'tools' => ['Filevine', 'HubSpot', 'GoHighLevel', 'Follow Up Boss', 'Ylopo', 'Zendesk', 'Close.io', 'Google Sheets', 'Google Workspace', 'Zapier', 'Calendly', 'SendGrid', 'Eventbrite', 'Debounce', 'Wix', 'PayPal', 'Stripe', 'Meta Business Suite', 'Canva', 'GMass'],
    'videoInfo' => [
        'videoUrl' => '/assets/video/297986_medium.mp4',
        'title' => 'Meet Pedro Medina | Bilingual Personal Injury Case Manager & Virtual Assistant',
        'duration' => '02:00',
        'status' => 'pending_embed',
        'placeholderPoster' => '/assets/va/pedro-medina/pedro-profile.webp',
        'topicsCovered' => [
            'Personal Injury Case Management and Legal Administrative Support',
            'Bilingual Client Communication and Medical Records Coordination',
            'Lead Generation, Cold Outreach, and CRM Management'
        ]
    ],
    'reviews' => [
        [
            'clientName' => 'Michael Thompson',
            'clientRole' => 'Managing Attorney',
            'company' => 'Thompson Legal Group',
            'rating' => 5.0,
            'date' => '2026-08-15',
            'comment' => 'Pedro has been a valuable addition to our operations. His understanding of personal injury case management, attention to detail, and consistent follow-up have made our daily workflow much easier. His bilingual communication skills are also a major advantage.'
        ],
        [
            'clientName' => 'Sarah Williams',
            'clientRole' => 'Operations Manager',
            'company' => 'Premier Business Solutions',
            'rating' => 4.9,
            'date' => '2026-07-20',
            'comment' => 'Pedro is organized, proactive, and very easy to work with. He handles client communications professionally, keeps track of pending tasks, and understands how important timely follow-ups are for business operations.'
        ],
        [
            'clientName' => 'David Anderson',
            'clientRole' => 'Business Development Director',
            'company' => 'Anderson Growth Partners',
            'rating' => 4.9,
            'date' => '2026-06-10',
            'comment' => 'Great experience working with Pedro. He understands lead generation, appointment setting, and CRM management. His ability to communicate in both English and Spanish makes him particularly versatile.'
        ]
    ],
    'featured' => false
    ],
    [
        'id' => 'va-5',
        'slug' => 'kim-chourio',
        'name' => 'Kim Chourio',
        'role' => 'Healthcare & Medical Billing VA',
        'category' => 'Healthcare',
        'secondaryRoles' => ['Administrative', 'Insurance'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 16,
        'rating' => 4.96,
        'reviewCount' => 35,
        'experienceYears' => 5,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'EST Compatible (US Eastern)',
        'avatar' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
        'tagline' => 'HIPAA-compliant patient scheduling, insurance verification, and EHR administration.',
        'shortBio' => 'Certified medical billing and telehealth administrative assistant trusted by US clinics and private wellness practices.',
        'fullBio' => 'Kim supports physicians, dental clinics, and mental health practices by managing patient communications, confirming eligibility with insurance payers, entering ICD-10/CPT codes, and resolving prior authorization delays with speed and empathy.',
        'keyResponsibilities' => [
            'Patient appointment scheduling and inbound telephone/chat inquiry triage',
            'Insurance eligibility pre-verification and co-pay collection follow-up',
            'EHR maintenance in Kareo, Epic, and SimplePractice under strict HIPAA rules',
            'Prior authorizations submission and claim denial follow-ups',
            'Medical record requests fulfillment and secure physician correspondence'
        ],
        'whyTheyExcel' => [
            '100% HIPAA trained and certified annually with strict device encryption',
            'Empathetic patient rapport that elevates Google review scores for clinics',
            'Bilingual capability enabling communication with diverse patient demographics'
        ],
        'tools' => ['SimplePractice', 'Kareo', 'Epic EHR', 'Availity', 'DrChrono', 'RingCentral'],
        'videoInfo' => [
            'videoUrl' => '/assets/video/297986_medium.mp4',
            'title' => 'HIPAA Protocols & Medical Office Workflow Walkthrough',
            'duration' => '01:50',
            'status' => 'pending_embed',
            'placeholderPoster' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
            'topicsCovered' => ['HIPAA compliance safeguards', 'Prior authorization tracking', 'Patient intake system']
        ],
        'reviews' => [
            [
                'clientName' => 'Dr. Gregory Hayes, MD',
                'clientRole' => 'Medical Director',
                'company' => 'Crestview Wellness Center',
                'rating' => 5,
                'date' => 'October 2026',
                'comment' => 'Kim slashed our claim denial rate by 40% and made patient check-ins seamless. Our patients frequently compliment her courteous phone manner.'
            ]
        ],
        'featured' => false
    ],
    [
        'id' => 'va-6',
        'slug' => 'jose-gregorio',
        'name' => 'José Gregorio',
        'role' => 'Operations & General Manager',
        'category' => 'Management',
        'secondaryRoles' => ['Administrative', 'Marketing'],
        'availability' => 'Part-time',
        'hoursPerWeek' => 20,
        'hourlyRate' => 18,
        'rating' => 4.9,
        'reviewCount' => 28,
        'experienceYears' => 5,
        'languages' => ['Spanish', 'English'],
        'timezone' => 'GMT+1',
        'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=800&auto=format&fit=crop',
        'tagline' => 'Experienced operations manager and administrative professional focused on efficiency and execution.',
        'shortBio' => 'Operations coordinator and general manager with a strong background in team leadership, client support, and administrative controls.',
        'fullBio' => 'Results-driven Operations Coordinator and General Manager with solid multi-year experience managing remote teams, human resources interviews, payroll administration, and customer relationship operations. Proven track record in scaling processes, optimizing pricing controls, and maintaining high operational standards across diverse digital platforms. Civil engineering background providing strong analytical, structural, and problem-solving capabilities.',
        'keyResponsibilities' => [
            'Supervising virtual and administrative teams to ensure daily operational efficiency',
            'Managing human resources processes, including interview controls and employee training',
            'Handling payroll administration, pricing controls, and inventory management',
            'Facilitating direct client support and strategic communication',
            'Executing CRM database management and appointment setting operations',
            'Creating sales proposals and marketing operational workflows'
        ],
        'whyTheyExcel' => [
            'Strong leadership and team supervision capabilities developed in managerial roles',
            'Rigorous attention to detail and analytical mindset grounded in engineering background',
            'Fluent communication skills for effective cross-departmental and client relations',
            'Proactive problem-solving and rapid adaptability to new digital tools'
        ],
        'tools' => ['Salesforce', 'Syncore', 'Follow Up Boss', 'Adobe Illustrator', 'Google Sheets'],
        'videoInfo' => [
            'videoUrl' => '/assets/video/297986_medium.mp4',
            'title' => 'Operations Management & Virtual Assistance Overview',
            'duration' => '01:45',
            'status' => 'pending_embed',
            'placeholderPoster' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=800&auto=format&fit=crop',
            'topicsCovered' => ['Team Supervision', 'CRM & Operations Management', 'Client Communication']
        ],
        'reviews' => [
            [
                'clientName' => 'Sarah Jenkins',
                'clientRole' => 'Operations Director',
                'company' => 'Swag Solutions Corp',
                'rating' => 5.0,
                'date' => '2025-11-14',
                'comment' => 'José demonstrated exceptional organizational skills and leadership while managing our division. Highly reliable and professional.'
            ],
            [
                'clientName' => 'Michael Vance',
                'clientRole' => 'Managing Partner',
                'company' => 'Promotional Growth LLC',
                'rating' => 4.9,
                'date' => '2026-01-20',
                'comment' => 'Fantastic support with team training and operational workflows. His background really shows in how structured he approaches daily tasks.'
            ]
        ],
        'featured' => false
    ],
    [
        'id' => 'va-7',
        'slug' => 'luisana-gimenez',
        'name' => 'Luisana Gimenez',
        'role' => 'Real Estate Transaction Coordinator VA',
        'category' => 'Real Estate',
        'secondaryRoles' => ['Administrative', 'Marketing'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 16,
        'rating' => 4.94,
        'reviewCount' => 39,
        'experienceYears' => 6,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'EST / CST / PST Compatible',
        'avatar' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80',
        'tagline' => 'Contract-to-close coordination, MLS listing entry, and escrow milestone management.',
        'shortBio' => 'Top-rated transaction coordinator assisting top-producing realtors and brokerage teams with flawless contract-to-close workflows.',
        'fullBio' => 'Luisana handles all transaction details from the moment a contract is signed until escrow closes. She liaises with title officers, mortgage lenders, home inspectors, and buyers/sellers to ensure disclosures are executed and key contingency milestones are never missed.',
        'keyResponsibilities' => [
            'Full contract-to-close coordination and contingency date tracking',
            'MLS property listing preparation, photo ordering, and description upload',
            'DocuSign and Dotloop packet preparation for buyer and seller disclosures',
            'Coordination with title companies, escrow officers, and home inspectors',
            'Open house marketing syndication and CRM lead follow-up in kvCORE/Follow Up Boss'
        ],
        'whyTheyExcel' => [
            'Successfully coordinated over 450 residential transactions across 12 US states',
            'Proactive milestone countdown that eliminates closing delay penalties',
            'Cheerful, professional client communication that reflects positively on your brokerage'
        ],
        'tools' => ['Dotloop', 'DocuSign', 'kvCORE', 'Follow Up Boss', 'MLS Matrix', 'Canva'],
        'videoInfo' => [
            'videoUrl' => '/assets/video/297986_medium.mp4',
            'title' => 'Contract-to-Close System Demonstration',
            'duration' => '01:40',
            'status' => 'pending_embed',
            'placeholderPoster' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80',
            'topicsCovered' => ['Transaction tracking timeline', 'Client disclosure compliance', 'Realtor time savings']
        ],
        'reviews' => [
            [
                'clientName' => 'Brandon Miller',
                'clientRole' => 'Team Leader',
                'company' => 'Miller Luxury Realty Group',
                'rating' => 5,
                'date' => 'October 2026',
                'comment' => 'Luisana is the backbone of our 40-deal-per-year production. Not a single deadline has slipped since she joined us.'
            ]
        ],
        'featured' => false
    ],
    [
        'id' => 'va-8',
        'slug' => 'Luis-gimenez',
        'name' => 'Luis Gimenez',
        'role' => 'Agile Project Manager & Scrum VA',
        'category' => 'Management',
        'secondaryRoles' => ['IT', 'Operations'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 24,
        'rating' => 4.97,
        'reviewCount' => 46,
        'experienceYears' => 8,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'EST / CST Compatible (US Eastern)',
        'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
        'tagline' => 'Sprint planning, team velocity optimization, and cross-functional delivery coordination.',
        'shortBio' => 'Certified Scrum Master (CSM) managing software roadmaps, backlog grooming, and remote team accountability for tech agencies.',
        'fullBio' => 'Luis specializes in taking disorganized project queues and turning them into predictable, transparent delivery sprints. He runs daily standups, tracks project budgets, documents product specifications, and facilitates clean communication between stakeholders and remote developers.',
        'keyResponsibilities' => [
            'Sprint backlog grooming, user story sizing, and milestone release planning',
            'Facilitating daily asynchronous or live Slack/Zoom standups and retrospectives',
            'Risk assessment, blocker escalation, and timeline dependency mapping in Jira/Linear',
            'Executive KPI reporting on budget burn rate and team velocity',
            'Standard operating procedure (SOP) documentation and team wikis in Notion'
        ],
        'whyTheyExcel' => [
            'Certified Scrum Master with 8 years of agile software delivery leadership',
            'Gifted at translating executive vision into actionable technical user stories',
            'Relentless focus on delivery velocity without developer burnout'
        ],
        'tools' => ['Jira Software', 'Linear', 'ClickUp', 'Notion', 'Miro', 'Slack', 'Loom'],
        'videoInfo' => [
            'videoUrl' => '/assets/video/297986_medium.mp4',
            'title' => 'Agile Delivery Framework & Project Management Walkthrough',
            'duration' => '02:15',
            'status' => 'pending_embed',
            'placeholderPoster' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
            'topicsCovered' => ['Sprint cadence setup', 'Cross-functional alignment', 'Velocity metrics']
        ],
        'reviews' => [
            [
                'clientName' => 'Chloe Sutherland',
                'clientRole' => 'Product VP',
                'company' => 'CloudPulse Software',
                'rating' => 5,
                'date' => 'September 2026',
                'comment' => 'Luis transformed our development chaos into a well-oiled machine. Sprints actually deliver on time now. An absolute rockstar!'
            ]
        ],
        'featured' => false
    ],
    [
        'id' => 'va-9',
        'slug' => 'abdallah-monroy',
        'name' => 'Abdallah Monroy',
        'role' => 'Full-Stack Developer',
        'category' => 'Development',
        'secondaryRoles' => ['Marketing', 'Management'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 18,
        'rating' => 4.89,
        'reviewCount' => 29,
        'experienceYears' => '5+',
        'languages' => ['Spanish', 'English'],
        'timezone' => 'GMT-3',
        'avatar' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=600&q=80',
        'tagline' => 'Full-Stack Developer building custom web applications, business solutions and intelligent automations.',
        'shortBio' => 'Full-Stack Developer with 5+ years of experience specializing in PHP, Laravel and WordPress. Skilled in building custom web applications, integrations and automated business solutions.',
        'fullBio' => 'Full-Stack Developer with over 5 years of experience designing, developing and maintaining web applications and business solutions. Specialized in PHP, Laravel and WordPress, with strong experience building custom plugins, WooCommerce functionality, dynamic websites and full-stack applications. Experienced in frontend development using JavaScript, Vue.js and React, as well as backend architecture, REST API integrations, webhooks, database management and business process automation. Beyond development, capable of analyzing business requirements, identifying technical opportunities and proposing practical solutions. Focused on clean code, performance, scalability and delivering reliable products that solve real business problems.',
        'keyResponsibilities' => [
            'Develop full-stack web applications using PHP and Laravel.',
            'Build and customize WordPress websites, plugins and WooCommerce solutions.',
            'Develop frontend interfaces using JavaScript, Vue.js and React.',
            'Integrate REST APIs, webhooks, CRM platforms and external services.',
            'Automate business workflows and repetitive processes.',
            'Manage databases, troubleshoot issues and optimize application performance.',
            'Analyze client requirements and propose scalable technical solutions.'
        ],
        'whyTheyExcel' => [
            'Combines technical development with business-oriented problem solving.',
            'Capable of managing projects from requirements analysis to implementation.',
            'Strong specialization in PHP, Laravel and WordPress ecosystems.',
            'Experienced in custom integrations and business process automation.',
            'Focuses on performance, maintainability and practical solutions.'
        ],
        'tools' => ['PHP', 'Laravel', 'WordPress', 'WooCommerce', 'JavaScript', 'Vue.js', 'React', 'HTML', 'CSS', 'Tailwind CSS', 'MySQL', 'PostgreSQL', 'REST APIs', 'Webhooks', 'Elementor', 'ACF', 'JetEngine', 'GSAP', 'Lenis', 'Figma', 'Photoshop', 'Git', 'GitHub', 'Docker'],
        'videoInfo' => [
            'videoUrl' => '/assets/video/297986_medium.mp4',
            'title' => 'Web Maintenance & Automation Workflow Demonstration',
            'duration' => '01:50',
            'status' => 'pending_embed',
            'placeholderPoster' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=600&q=80',
            'topicsCovered' => ['No-code automation examples', 'Speed tuning techniques', 'E-commerce fixes']
        ],
        'reviews' => [
            [
                'clientName' => 'Nathan Cole',
                'clientRole' => 'E-commerce Director',
                'company' => 'Solstice Apparel',
                'rating' => 5,
                'date' => 'August 2026',
                'comment' => 'Abdallah built our entire Zapier sync between Shopify and our fulfillment center in 48 hours. Fast, communicative, and extremely competent.'
            ]
        ],
        'featured' => false
    ],
    [
        'id' => 'va-10',
        'slug' => 'maria-marcano',
        'name' => 'Maria Marcano',
        'role' => 'Multi-Channel Paid Ads & Social Media VA',
        'category' => 'Marketing',
        'secondaryRoles' => ['Administrative', 'Legal'],
        'availability' => 'Part-time',
        'hoursPerWeek' => 25,
        'hourlyRate' => 17,
        'rating' => 4.91,
        'reviewCount' => 33,
        'experienceYears' => 5,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'EST / CST Compatible (US Eastern & Central)',
        'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
        'tagline' => 'Meta & Google Ads campaign monitoring, creative testing, and weekly ROAS reporting.',
        'shortBio' => 'Bilingual digital ads assistant helping marketing managers monitor ad budgets, launch creative tests, and extract actionable conversion data.',
        'fullBio' => 'Maria supports marketing agencies and high-growth brands in scaling their paid user acquisition. She handles campaign uploads in Meta Ads Manager and Google Ads, organizes creative A/B testing variations, audits ad spend discrepancies, and builds live performance dashboards.',
        'keyResponsibilities' => [
            'Ad campaign setup, audience targeting configuration, and UTM parameter tagging',
            'Creative asset organization and variations testing (copy, thumbnails, formats)',
            'Budget pacing monitoring to prevent overspending on active campaigns',
            'Competitor ad research using Meta Ad Library and TikTok Creative Center',
            'Weekly ROAS and CPA summary reports for marketing stakeholders'
        ],
        'whyTheyExcel' => [
            'High attention to detail ensuring zero budget leakage or targeting errors',
            'Bilingual fluency allows managing ad campaigns targeted to US Hispanic markets',
            'Quick mastery of client attribution software (Triple Whale, Northbeam)'
        ],
        'tools' => ['Meta Ads Manager', 'Google Ads', 'Canva', 'Triple Whale', 'Google Sheets', 'Figma'],
        'videoInfo' => [
            'videoUrl' => '/assets/video/297986_medium.mp4',
            'title' => 'Paid Media Execution & ROAS Dashboard Walkthrough',
            'duration' => '01:45',
            'status' => 'pending_embed',
            'placeholderPoster' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
            'topicsCovered' => ['Meta campaign structure', 'Creative testing framework', 'Attribution metrics']
        ],
        'reviews' => [
            [
                'clientName' => 'Liam Foster',
                'clientRole' => 'Growth Lead',
                'company' => 'Apex D2C Brands',
                'rating' => 5,
                'date' => 'October 2026',
                'comment' => 'Maria saves our media buyers 15 hours every week in manual campaign builds and report generation. She is fast, dependable, and sharp.'
            ]
        ],
        'featured' => false
    ]
];
