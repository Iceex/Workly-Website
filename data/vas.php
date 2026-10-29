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
        'slug' => 'lari-pico',
        'name' => 'Lari Pico',
        'role' => 'Executive & Operations Administrative VA',
        'category' => 'Administrative',
        'secondaryRoles' => ['Management', 'Operations'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 15,
        'rating' => 4.9,
        'reviewCount' => 38,
        'experienceYears' => 6,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'EST / CST Compatible (US Eastern)',
        'avatar' => 'assets/images/va_portrait_sarah_1793194427374.jpg',
        'tagline' => 'High-caliber executive calendar management, inbox zero, and cross-functional operations.',
        'shortBio' => 'Former executive assistant at mid-sized consulting firms, specializing in high-velocity executive schedules, vendor coordination, and board meeting briefings.',
        'fullBio' => 'Lari has over 6 years of dedicated experience supporting C-level executives and fast-growing founders. She takes complete ownership of your daily rhythm—from dynamic calendar triage and inbox prioritization to organizing complex travel itineraries and coordinating team-wide weekly standups. Known for calm under pressure and meticulous discretion.',
        'keyResponsibilities' => [
            'Autonomous email inbox screening, sorting, and draft preparation',
            'Complex calendar scheduling, timezone conversions, and board meeting prep',
            'Travel logistics: flights, accommodations, ground transfers, and itemized expense reports',
            'Vendor management, invoicing verification, and procurement follow-up',
            'Meeting minutes, action item distribution, and accountability tracking'
        ],
        'whyTheyExcel' => [
            'Proactive foresight: anticipates executive needs 48 hours before deadlines',
            'Absolute discretion with confidential financial and strategic documents',
            'Exceptional written English with polished executive tone'
        ],
        'tools' => ['Google Workspace', 'Slack', 'Notion', 'Asana', 'QuickBooks Online', 'Expensify', 'Zoom'],
        'videoInfo' => [
            'videoUrl' => '/assets/video/sample_video-720p.mp4',
            'title' => 'Executive Assistant Introduction & Workflow Walkthrough',
            'duration' => '01:45',
            'status' => 'pending_embed',
            'placeholderPoster' => 'assets/images/va_portrait_sarah_1793194427374.jpg',
            'topicsCovered' => ['Executive workflow setup', 'Sample inbox management strategy', 'Confidentiality assurance']
        ],
        'reviews' => [
            [
                'clientName' => 'Arthur Bradley',
                'clientRole' => 'CEO & Founder',
                'company' => 'Apex Media Ventures',
                'rating' => 5,
                'date' => 'October 2026',
                'comment' => 'Lari revolutionized my workday. I went from spending 3 hours on calendar mess and emails to zero. She is sharp, prompt, and treats my business as her own.'
            ],
            [
                'clientName' => 'Rachel Simmons',
                'clientRole' => 'Managing Director',
                'company' => 'Beacon Strategic Advisory',
                'rating' => 5,
                'date' => 'August 2026',
                'comment' => 'Flawless organizational skills. Lari handled our quarterly investor summits without a single hiccup.'
            ]
        ],
        'featured' => true
    ],
    [
        'id' => 'va-2',
        'slug' => 'jose-villegas',
        'name' => 'Jose Villegas',
        'role' => 'DevOps & IT Cloud Support VA',
        'category' => 'IT',
        'secondaryRoles' => ['Administrative', 'Management'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 22,
        'rating' => 4.95,
        'reviewCount' => 42,
        'experienceYears' => 7,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'PST / MST Compatible (US Pacific)',
        'avatar' => 'assets/images/va_portrait_marcus_1793194428958.jpg',
        'tagline' => 'Cloud infrastructure maintenance, CI/CD pipeline monitoring, and IT helpdesk management.',
        'shortBio' => 'Experienced tech VA handling server uptime, Docker container deployments, DNS configurations, and employee IT onboarding workflows.',
        'fullBio' => 'Villegas brings 7 years of hands-on infrastructure and technical support background. He bridges the gap between software engineers and day-to-day IT operations, monitoring AWS/GCP workloads, handling user access provisioning, security patch updates, and database backup verification.',
        'keyResponsibilities' => [
            'Cloud instance monitoring (AWS EC2/S3, Cloudflare, Google Cloud Platform)',
            'CI/CD pipeline triage and automated build status alerting',
            'Employee onboarding: provisioning email, SSO, GitHub, and 1Password credentials',
            'SSL certificate renewal, DNS record propagation, and domain registrar maintenance',
            'Internal IT ticket resolution with an average response time under 15 minutes'
        ],
        'whyTheyExcel' => [
            'Strong diagnostic instincts: resolves DevOps bottlenecks before they cause downtime',
            'Security-first mindset strictly adhering to least-privilege access principles',
            'Clear documentation in Markdown, Confluence, and GitHub Wikis'
        ],
        'tools' => ['AWS', 'Docker', 'GitHub Actions', 'Cloudflare', 'Jira', '1Password', 'Linux/Bash'],
        'videoInfo' => [
            'title' => 'Technical Overview & Infrastructure Monitoring Demo',
            'duration' => '02:10',
            'status' => 'pending_embed',
            'placeholderPoster' => 'assets/images/va_portrait_marcus_1793194428958.jpg',
            'topicsCovered' => ['Cloud server troubleshooting', 'Access provisioning workflow', 'Security posture']
        ],
        'reviews' => [
            [
                'clientName' => 'David K.',
                'clientRole' => 'VP of Engineering',
                'company' => 'Veloce Labs',
                'rating' => 5,
                'date' => 'September 2026',
                'comment' => 'Villegas took over our tier-1 developer tickets and cloud alerts. Our senior engineers regained 25% of their sprint time. Remarkable asset!'
            ]
        ],
        'featured' => true
    ],
    [
        'id' => 'va-3',
        'slug' => 'helen-ninja',
        'name' => 'Heleene Ninja',
        'role' => 'Growth Marketing & Content Strategist VA',
        'category' => 'Marketing',
        'secondaryRoles' => ['Administrative', 'Management'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 18,
        'rating' => 4.88,
        'reviewCount' => 31,
        'experienceYears' => 5,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'EST / CST Compatible (US Eastern & Central)',
        'avatar' => 'assets/images/va_portrait_elena_1793194428112.jpg',
        'tagline' => 'Multi-channel organic growth, social calendar execution, and email nurture flows.',
        'shortBio' => 'Bilingual marketing VA adept in turning brand objectives into structured editorial calendars, SEO-optimized blog copy, and HubSpot automation flows.',
        'fullBio' => 'Helen is a dynamic growth marketing specialist who has managed content engines for B2B tech and e-commerce brands in the US and Latin America. She coordinates social campaigns across LinkedIn and Instagram, configures email newsletters, writes compelling copy, and tracks campaign analytics diligently.',
        'keyResponsibilities' => [
            'End-to-end social media scheduling and community comment moderation',
            'Newsletter design and copywriting in Klaviyo, Mailchimp, and HubSpot',
            'SEO keyword research and on-page optimization for WordPress/Webflow',
            'Brand asset production with Canva Pro and Figma templates',
            'Weekly engagement and conversion reporting using Google Looker Studio'
        ],
        'whyTheyExcel' => [
            'Native fluency in both English and Spanish, opening cross-border market reach',
            'Analytical mindset that measures content performance against real pipeline metrics',
            'Visual polish that strictly maintains brand guidelines and aesthetics'
        ],
        'tools' => ['HubSpot', 'Canva', 'Klaviyo', 'Buffer', 'Ahrefs', 'Figma', 'Google Analytics 4'],
        'videoInfo' => [
            'title' => 'Portfolio Presentation: Content & Email Campaign Strategy',
            'duration' => '01:55',
            'status' => 'pending_embed',
            'placeholderPoster' => 'assets/images/va_portrait_elena_1793194428112.jpg',
            'topicsCovered' => ['Bilingual copy samples', 'HubSpot automation architecture', 'Social growth case studies']
        ],
        'reviews' => [
            [
                'clientName' => 'Megan Thorne',
                'clientRole' => 'CMO',
                'company' => 'Lumina Skincare Global',
                'rating' => 5,
                'date' => 'October 2026',
                'comment' => 'Helen increased our newsletter open rate from 21% to 37% within 90 days. Her dual English-Spanish content expanded our Miami and LatAm outreach.'
            ]
        ],
        'featured' => true
    ],
    [
        'id' => 'va-4',
        'slug' => 'pedro-medina',
        'name' => 'Pedro Medina',
        'role' => 'Paralegal & Legal Operations VA',
        'category' => 'Legal',
        'secondaryRoles' => ['Administrative'],
        'availability' => 'Part-time',
        'hoursPerWeek' => 25,
        'hourlyRate' => 20,
        'rating' => 4.92,
        'reviewCount' => 27,
        'experienceYears' => 6,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'EST / CST Compatible (US Eastern)',
        'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
        'tagline' => 'Legal document drafting, contract intake management, and Clio law practice coordination.',
        'shortBio' => 'Trained legal assistant with extensive law firm background in litigation support, intake questionnaire processing, and contract redlining support.',
        'fullBio' => 'Pedro works closely with solo attorneys and boutique law firms handling administrative and paralegal tasks. From preparing court filings and client intake forms to indexing discovery documents and managing Clio calendaring, Pedro ensures legal deadlines are maintained without exception.',
        'keyResponsibilities' => [
            'Clio and MyCase practice management, case notes, and court filing calendar tracking',
            'Standard contract review preparation, NDAs, and redline version tracking',
            'Client intake questionnaires and conflict-of-interest check coordination',
            'Discovery indexing, Bates stamping, and exhibit binder preparation',
            'Trust accounting invoice entry and client retainer follow-up'
        ],
        'whyTheyExcel' => [
            'Rigorous attention to legal citation and formatting accuracy',
            'Strict adherence to attorney-client privilege and data confidentiality standards',
            'Rapid turnaround on urgent pleading drafts and motion schedules'
        ],
        'tools' => ['Clio', 'LexisNexis', 'Adobe Acrobat Pro', 'DocuSign', 'MyCase', 'Microsoft 365'],
        'videoInfo' => [
            'title' => 'Legal Practice Support & Case Management Demo',
            'duration' => '02:05',
            'status' => 'pending_embed',
            'placeholderPoster' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
            'topicsCovered' => ['Clio workflow organization', 'Confidential filing protocols', 'Document indexing']
        ],
        'reviews' => [
            [
                'clientName' => 'Harold Sterling, Esq.',
                'clientRole' => 'Senior Partner',
                'company' => 'Sterling & Vance LLP',
                'rating' => 5,
                'date' => 'September 2026',
                'comment' => 'Pedro has been instrumental in keeping our litigation deadlines spotless. His legal acumen and speed with Clio are first-rate.'
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
        'name' => 'Jose Gregorio',
        'role' => 'Insurance Claims & Policy VA',
        'category' => 'Insurance',
        'secondaryRoles' => ['Administrative', 'Legal'],
        'availability' => 'Full-time',
        'hoursPerWeek' => 40,
        'hourlyRate' => 17,
        'rating' => 4.87,
        'reviewCount' => 22,
        'experienceYears' => 4,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'CST / EST Compatible (US Central)',
        'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
        'tagline' => 'Policy endorsements, certificate of insurance (COI) generation, and claims processing.',
        'shortBio' => 'Dedicated insurance virtual assistant supporting independent insurance agencies across commercial, auto, and property casualty lines.',
        'fullBio' => 'Jose assists insurance brokers and underwriters with daily operational paperwork: issuing certificates of insurance (COIs) within 30 minutes, auditing renewal applications, processing policy endorsements, and cross-referencing carrier rating systems.',
        'keyResponsibilities' => [
            'Rapid Certificate of Insurance (COI) generation and distribution to insureds',
            'Policy change requests (endorsements, loss payees, driver additions)',
            'Renewal book review and comparative carrier quote extraction (EZLynx, Applied Epic)',
            'First Notice of Loss (FNOL) documentation and adjuster status tracking',
            'Direct carrier portal data entry and commission statement reconciliation'
        ],
        'whyTheyExcel' => [
            'In-depth knowledge of commercial P&C terminology and Acord forms',
            'Zero-error standard on policy numbers and coverage limit certificates',
            'Speed: 95% of routine COIs issued in under 30 minutes'
        ],
        'tools' => ['Applied Epic', 'EZLynx', 'HawkSoft', 'Vertafore AMS360', 'Excel', 'Acord Forms'],
        'videoInfo' => [
            'videoUrl' => '/assets/video/297986_medium.mp4',
            'title' => 'Insurance Operations & Acord Form Processing Video',
            'duration' => '02:00',
            'status' => 'pending_embed',
            'placeholderPoster' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
            'topicsCovered' => ['COI turnaround process', 'Agency management software overview', 'Client satisfaction']
        ],
        'reviews' => [
            [
                'clientName' => 'Karen Whitaker',
                'clientRole' => 'Principal Broker',
                'company' => 'Whitaker Risk Partners',
                'rating' => 5,
                'date' => 'July 2026',
                'comment' => 'Jose freed our producers to focus purely on selling. He handles all our Acord forms and certificates with flawless accuracy.'
            ]
        ],
        'featured' => false
    ],
    [
        'id' => 'va-7',
        'slug' => 'luisana-gimenez',
        'name' => 'Luisana Giminez',
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
        'role' => 'Full-Stack Web Support & API Specialist VA',
        'category' => 'IT',
        'secondaryRoles' => ['Management'],
        'availability' => 'Part-time',
        'hoursPerWeek' => 20,
        'hourlyRate' => 21,
        'rating' => 4.89,
        'reviewCount' => 29,
        'experienceYears' => 5,
        'languages' => ['English', 'Spanish'],
        'timezone' => 'PST / CST Compatible',
        'avatar' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=600&q=80',
        'tagline' => 'WordPress/Shopify maintenance, Zapier/Make automations, and frontend bug fixes.',
        'shortBio' => 'Hands-on web assistant handling landing page deployments, speed optimization, webhooks, and third-party app integrations.',
        'fullBio' => 'Abdallah provides on-demand technical support for online stores and digital businesses. Whether fixing layout glitches, creating complex webhook automations in Make.com, or configuring GA4 tracking events, Abdallah executes quickly without requiring high agency retainers.',
        'keyResponsibilities' => [
            'Shopify & WordPress theme customization, plugin updates, and backup checks',
            'Zapier, Make, and webhook integrations between CRM, billing, and email systems',
            'Page speed optimization (Core Web Vitals, asset compression, caching)',
            'Form validation, payment gateway troubleshooting (Stripe, PayPal)',
            'Landing page building using Tailwind, Webflow, and modern HTML/CSS'
        ],
        'whyTheyExcel' => [
            'Solves front-end bugs and webhook edge cases with rapid turnaround',
            'Thorough testing across Chrome, Safari, iOS, and Android before pushing live',
            'Clear, jargon-free explanations to non-technical business owners'
        ],
        'tools' => ['WordPress', 'Shopify', 'Zapier', 'Make.com', 'HTML/CSS/JS', 'Stripe', 'Webflow'],
        'videoInfo' => [
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
        'secondaryRoles' => ['Administrative', 'Real Estate'],
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
