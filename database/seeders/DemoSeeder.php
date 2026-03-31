<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DemoSeeder extends Seeder
{
    /*
     * ─── Category data ────────────────────────────────────────────────────────
     * 7 টা category যেগুলো বাংলাদেশের প্রেক্ষাপটে relevant
     */
    private array $categories = [
        'Technology',
        'Lifestyle',
        'Travel',
        'Health & Fitness',
        'Food & Recipe',
        'Career & Education',
        'Sports',
    ];

    /*
     * ─── Bangladeshi names ────────────────────────────────────────────────────
     * 100 জন user এর জন্য real Bangladeshi names
     */
    private array $names = [
        'Arif Hossain',     'Nadia Islam',      'Rahim Uddin',      'Sumaiya Akter',
        'Karim Molla',      'Tania Begum',       'Shahed Ali',       'Fatema Khatun',
        'Rubel Ahmed',      'Sadia Rahman',      'Milon Sarkar',     'Rupa Devi',
        'Jahangir Alam',    'Nasrin Jahan',      'Belal Hossain',    'Shirina Akter',
        'Sohel Rana',       'Moni Begum',        'Faruk Ahmed',      'Puja Saha',
        'Mizanur Rahman',   'Layla Islam',       'Delwar Hossain',   'Sharmin Sultana',
        'Rony Das',         'Meher Nigar',       'Masum Billah',     'Sanjida Akter',
        'Imran Hossain',    'Reshma Begum',      'Tanvir Ahmed',     'Bristy Rani',
        'Shakil Mahmud',    'Mousumi Islam',     'Rakib Hasan',      'Asha Khatun',
        'Naim Sheikh',      'Hafsa Begum',       'Asif Iqbal',       'Nusrat Jahan',
        'Sujon Mondol',     'Roksana Begum',     'Tofael Ahmed',     'Jannatul Ferdous',
        'Sabbir Rahman',    'Kohinoor Akter',    'Habib Ullah',      'Sabina Yasmin',
        'Mamun Rashid',     'Dipa Akter',        'Ershad Ali',       'Taslima Begum',
        'Zahirul Islam',    'Sumona Das',        'Jewel Rana',       'Lipa Akter',
        'Badrul Alam',      'Rima Begum',        'Nur Alam',         'Shanta Rani',
        'Saiful Islam',     'Mukta Begum',       'Liton Miah',       'Poly Khatun',
        'Arman Hossain',    'Keya Begum',        'Feroz Khan',       'Champa Begum',
        'Mosharraf Hossain','Ratna Akter',       'Abul Kalam',       'Beli Begum',
        'Ripon Ahmed',      'Lina Sultana',      'Enamul Haque',     'Mitu Akter',
        'Azad Rahman',      'Shirin Akter',      'Wahid Hossain',    'Jharna Begum',
        'Suzan Ahmed',      'Renu Akter',        'Bulbul Ahmed',     'Shefali Begum',
        'Kabir Hossain',    'Salma Begum',       'Helal Uddin',      'Farhana Islam',
        'Momin Ali',        'Bilkis Begum',      'Liton Das',        'Aklima Khatun',
        'Ruhul Amin',       'Morsheda Begum',    'Mainul Islam',     'Hosne Ara',
        'Hasib Rahman',     'Farida Begum',      'Kamrul Hassan',    'Setu Akter',
    ];

    /*
     * ─── Article content pool ─────────────────────────────────────────────────
     * Realistic article titles and content per category
     * প্রতিটা category র জন্য কয়েকটা করে title + content paragraph আছে
     */
    private array $articlePool = [
        'Technology' => [
            [
                'title' => 'How Artificial Intelligence is Changing Bangladesh',
                'body'  => '<p>Artificial Intelligence is no longer a distant concept — it is reshaping industries across Bangladesh. From agriculture to healthcare, AI-driven tools are being deployed to solve real-world problems.</p><p>In Dhaka, several startups are now using machine learning to predict crop yields, helping farmers make better decisions. Meanwhile, hospitals in Chittagong have begun piloting AI-assisted diagnosis for tuberculosis, reducing turnaround time significantly.</p><p>The key challenge remains infrastructure — consistent electricity and internet access are prerequisites for AI adoption. But with mobile penetration crossing 90%, the potential is enormous. Bangladesh is quietly building a tech-forward future.</p>',
            ],
            [
                'title' => 'Why Every Bangladeshi Developer Should Learn Cloud Computing',
                'body'  => '<p>Cloud computing has become the backbone of modern software. For Bangladeshi developers looking to compete globally, understanding AWS, Azure, or Google Cloud is no longer optional — it is essential.</p><p>Remote work opportunities have exploded post-pandemic, and most international clients now expect cloud-native development skills. A developer who can deploy on cloud infrastructure and manage scalable systems commands significantly higher rates.</p><p>The good news is that free tiers from major cloud providers make learning accessible even on a tight budget. Dedicate two hours a day for three months, and you will have a skill that transforms your career.</p>',
            ],
            [
                'title' => 'Top 5 Tech Startups to Watch in Bangladesh in 2025',
                'body'  => '<p>Bangladesh\'s startup ecosystem is maturing rapidly. Beyond the well-known names, a new wave of focused, product-driven companies is emerging with real traction.</p><p>Shajgoj has grown from a beauty platform to a full lifestyle marketplace. Shohoz continues to expand beyond ride-sharing into logistics. Shikho is redefining EdTech with vernacular content. Osudpotro is making medicine delivery seamless. And iFarmer is connecting rural farmers to urban investors.</p><p>What these companies share is a deep understanding of local problems and the patience to build sustainable solutions. The next five years will be defining for Bangladesh\'s digital economy.</p>',
            ],
            [
                'title' => 'Freelancing in Bangladesh: From Zero to Six Figures',
                'body'  => '<p>Bangladesh ranks among the top countries for freelance talent globally. Platforms like Upwork, Fiverr, and Toptal have thousands of active Bangladeshi professionals earning in foreign currency.</p><p>The most in-demand skills are web development, graphic design, digital marketing, and data entry. But the highest earners have moved up the value chain — specialising in SaaS development, UI/UX design, or performance marketing.</p><p>The journey is rarely overnight. Consistent portfolio building, client communication skills, and niche positioning are what separate those earning $500 a month from those earning $5,000. Start small, deliver well, and scale deliberately.</p>',
            ],
            [
                'title' => 'Building Your First Mobile App with Flutter',
                'body'  => '<p>Flutter has become one of the most popular frameworks for cross-platform mobile development. With a single codebase, you can deploy to both Android and iOS — ideal for budget-conscious indie developers.</p><p>Getting started is surprisingly straightforward. Install the Flutter SDK, set up Android Studio, and you are writing Dart code within an hour. The widget-based architecture feels intuitive once you understand the composition model.</p><p>For Bangladeshi developers, the real opportunity is building local utility apps — prayer time apps, rickshaw booking, local bus tracking, or hyperlocal delivery services. The market is underserved and the tools are free.</p>',
            ],
        ],
        'Lifestyle' => [
            [
                'title' => 'How I Simplified My Morning Routine and Changed My Life',
                'body'  => '<p>For years I was the person who hit snooze four times, rushed through breakfast, and arrived at work already exhausted. The mornings felt like a battle I kept losing.</p><p>The change came when I stopped trying to do everything and started doing three things well. Wake up at the same time every day. Drink water before coffee. Write three things I am grateful for. That is it.</p><p>Within two weeks, my energy levels improved noticeably. Within a month, I was getting more done before noon than I used to accomplish in a full day. Simplicity, it turns out, is the ultimate productivity hack.</p>',
            ],
            [
                'title' => 'Living in Dhaka: Finding Peace in a Chaotic City',
                'body'  => '<p>Dhaka is not a city that whispers. It roars, honks, floods, and somehow still functions. Living here requires a particular kind of resilience — and a willingness to find beauty in the chaos.</p><p>The trick is micro-habits. A morning walk in Ramna Park before the traffic builds. Tea at the local cha stall where the uncle knows your order. A bookshelf that feels like a sanctuary when the noise outside reaches peak levels.</p><p>Dhaka is exhausting, yes. But it is also alive in a way that quieter cities rarely are. You just need to learn where to find its gentler corners.</p>',
            ],
            [
                'title' => 'Minimalism on a Bangladeshi Budget',
                'body'  => '<p>Minimalism is often portrayed as a luxury — decluttered white apartments with expensive furniture. But the core idea is accessible to anyone: own what you use, use what you own.</p><p>In Bangladesh, this philosophy has deep roots. Our grandparents repaired rather than replaced. They stored only what was necessary. The consumerism wave is relatively new.</p><p>Practical minimalism here looks like: one good kurta instead of five cheap ones. A capsule wardrobe of five staples. One bookshelf, curated. The goal is less maintenance, less clutter, more clarity.</p>',
            ],
        ],
        'Travel' => [
            [
                'title' => 'Sundarbans: What Nobody Tells You Before You Go',
                'body'  => '<p>Everyone knows Sundarbans is the world\'s largest mangrove forest and home to the Royal Bengal Tiger. What the travel blogs do not tell you is how it feels to be there — the primal, humbling quietness of moving through dense jungle by boat.</p><p>We saw no tigers. Most visitors do not. But we saw spotted deer drinking at dusk, kingfishers diving with surgical precision, and a sky so full of stars it felt like a different planet. That was enough — more than enough.</p><p>Pack light, bring insect repellent, and mentally prepare for basic accommodation. The experience is worth every discomfort.</p>',
            ],
            [
                'title' => "Cox's Bazar Beyond the Beach",
                'body'  => '<p>The world\'s longest sea beach is Cox\'s Bazar\'s calling card. But most visitors see only the main beach strip and leave without discovering what makes this place truly special.</p><p>Drive thirty minutes south to Inani Beach — fewer crowds, clearer water, and coral reefs you can wade through. Head inland to Ramu, where ancient Buddhist temples sit quietly amid palm groves. Visit Himchhari waterfall in the monsoon when it runs full and fierce.</p><p>Cox\'s Bazar rewards the curious. Give it more than a weekend and it will give you far more in return.</p>',
            ],
            [
                'title' => 'Budget Travel Across Bangladesh: 30 Days, 30,000 Taka',
                'body'  => '<p>Bangladesh is one of the most rewarding — and cheapest — countries to travel within South Asia. With thirty thousand taka and thirty days, I covered seven divisions, fourteen districts, and collected stories I will tell for decades.</p><p>The key is using local transport. Intercity buses are comfortable enough and a fraction of the cost of flying. River ferries are slow but unforgettable — especially the overnight journey from Dhaka to Barisal watching sunrise over the river delta.</p><p>Eat at local restaurants, stay at guesthouse, and trust the warmth of Bangladeshis. You will rarely feel more welcomed anywhere on earth.</p>',
            ],
        ],
        'Health & Fitness' => [
            [
                'title' => 'How I Lost 15kg Without a Gym Membership',
                'body'  => '<p>I had no gym access, no personal trainer, and a budget of zero for fitness equipment. What I had was a small balcony, thirty minutes in the morning, and a decision to stop making excuses.</p><p>The foundation was simple: walk 8,000 steps daily, do bodyweight exercises four times a week, and eat home-cooked meals instead of restaurant food. No crash diets. No supplements. Just consistency.</p><p>Six months later, 15kg was gone. More importantly, my energy, sleep quality, and mood had transformed. The gym is great, but it is not a prerequisite for being healthy.</p>',
            ],
            [
                'title' => 'Mental Health in Bangladesh: Breaking the Silence',
                'body'  => '<p>Mental health remains heavily stigmatised in Bangladesh. Depression is dismissed as weakness, anxiety is called overthinking, and therapy is still considered something for the severely ill or the wealthy.</p><p>This needs to change. According to WHO estimates, nearly 16% of Bangladeshis suffer from some form of mental disorder. The gap between need and care is enormous.</p><p>Progress is happening — slowly. Organisations like Kaan Pete Roi provide free counselling by phone. Universities are beginning to hire counsellors. The conversation, once taboo, is getting louder. If you are struggling, please reach out. You are not alone.</p>',
            ],
            [
                'title' => 'The Bangladeshi Diet: What We Get Right and What We Get Wrong',
                'body'  => '<p>Dal, rice, and fish — the Bangladeshi staple is actually remarkably balanced when not drowned in oil. Lentils provide protein, fish provides omega-3, and rice provides energy. The traditional diet is nutritionally sound.</p><p>Where we go wrong is cooking method and quantity. Excessive ghee in biryani, deep-frying everything, and ultra-processed snacks have introduced lifestyle diseases at alarming rates.</p><p>The fix is not abandoning our cuisine — it is returning to how our grandmothers cooked it. Less oil, more vegetables, smaller portions. The best diet for Bangladeshis is Bangladeshi food, done properly.</p>',
            ],
        ],
        'Food & Recipe' => [
            [
                'title' => 'The Perfect Hilsa Recipe My Grandmother Taught Me',
                'body'  => '<p>Ilish macher jhol is more than a dish in Bangladesh — it is an institution, a ritual, a memory encoded in smell. Every family has their version. This is ours.</p><p>The secret is restraint. Mustard oil, mustard paste, green chilli, turmeric, and salt. Nothing else. The fish speaks for itself. Cook it on low heat with the lid on for exactly twelve minutes. Do not stir — the pieces will break.</p><p>Serve with plain white rice, a squeeze of lemon, and someone you love nearby. That is the complete recipe. The rest is technique.</p>',
            ],
            [
                'title' => 'Street Food of Old Dhaka: A Walking Food Tour',
                'body'  => '<p>Old Dhaka is arguably the greatest open-air food market in South Asia. Within a one-kilometre radius of Chawkbazar, you can eat your way through four centuries of Mughal-influenced cuisine.</p><p>Start with bakarkhani at dawn — the flaky, layered bread that has been made the same way since the Nawab era. Move to kachchi biryani for lunch, where the rice and mutton have been slow-cooked overnight. Finish with badam halwa and a glass of borhani.</p><p>Wear loose clothing. Bring antacids. Bring friends. And come hungry — very, very hungry.</p>',
            ],
            [
                'title' => 'How to Make Authentic Dhaka-Style Beef Kala Bhuna',
                'body'  => '<p>Kala bhuna is the pride of Chittagong cuisine — beef slow-cooked until dark, dry, and intensely flavoured. Getting it right requires two things: patience and a heavy-bottomed pot.</p><p>Marinate beef with ginger, garlic, onion, yogurt, and a blend of whole spices overnight. The next day, cook on medium heat, stirring regularly, for two to three hours until the moisture is completely gone and the meat has caramelised dark.</p><p>The colour comes from the natural sugars in the onion browning deeply. No artificial colouring is needed — and none should be used. Serve with paratha or plain rice.</p>',
            ],
        ],
        'Career & Education' => [
            [
                'title' => 'Why I Quit My Government Job to Become a Developer',
                'body'  => '<p>I had the job everyone in my family wanted for me. Stable salary, pension, respect at family gatherings. I quit it after three years.</p><p>The decision was not impulsive. I had spent eighteen months learning web development on evenings and weekends. I had three freelance clients and a modest portfolio. When my monthly freelance income exceeded my government salary, the decision made itself.</p><p>The first year was terrifying. Then it became the best professional decision I ever made. If you are in a similar place — uncomfortable but ready — the jump is worth it.</p>',
            ],
            [
                'title' => 'How to Prepare for the BCS Exam Without Losing Your Mind',
                'body'  => '<p>The BCS exam is the most competitive in Bangladesh. Hundreds of thousands sit for a few hundred positions. The odds are brutal, and the preparation timeline spans years.</p><p>The candidates who succeed are not necessarily the most intelligent — they are the most organised. Syllabus breakdown, weekly targets, topic rotation, regular mock tests. System beats talent over a multi-year preparation period.</p><p>Equally important is mental health. Build in rest days. Maintain friendships. Exercise. The person who burns out six months before the exam gains nothing from five years of preparation.</p>',
            ],
            [
                'title' => 'Skills That Will Make You Hireable Anywhere in the World',
                'body'  => '<p>Geography is increasingly irrelevant for knowledge workers. A well-skilled professional in Sylhet can compete for the same remote job as someone in Singapore — if they have the right skills and can communicate them effectively.</p><p>The universal skills are: clear written communication in English, ability to work asynchronously, one deep technical skill at a professional level, and basic project management. These four open doors globally.</p><p>The deeper truth is that most candidates lack the first skill — writing. Invest in improving your writing and you will immediately stand out in most applicant pools.</p>',
            ],
        ],
        'Sports' => [
            [
                'title' => 'The Rise of Bangladesh Cricket: From Minnows to Contenders',
                'body'  => '<p>When Bangladesh played their first Test match in 2000, the cricketing world treated them as an obligatory addition to the calendar. Two decades later, they are a side capable of beating any team on their day.</p><p>The transformation is built on consistency in the domestic structure, emergence of match-winners like Shakib and Mushfiqur, and a generation of young talent that grew up believing they could compete. The belief is the foundation everything else is built on.</p><p>The next step is away-form consistency. Bangladesh must win Tests outside the subcontinent to be taken fully seriously. The squad to do it exists. The question is whether the system will support them.</p>',
            ],
            [
                'title' => 'Why Football Still Has a Chance in Bangladesh',
                'body'  => '<p>Cricket dominates Bangladesh\'s sporting imagination so completely that football is often dismissed as a minor interest. But the crowds that fill stadiums for domestic football, and the passion for the Premier League in every tea stall, suggest the sport still has enormous latent energy.</p><p>The problem is structural: poor league quality, lack of investment in youth development, and the absence of a domestic player who has become a genuine icon. Fix these, and the cricket monopoly on attention can be challenged.</p><p>Countries like Vietnam and Malaysia have transformed their football programmes within a generation. There is no reason Bangladesh cannot do the same.</p>',
            ],
            [
                'title' => 'My Experience Running the Dhaka Marathon for the First Time',
                'body'  => '<p>I am not a runner. I have never been a runner. I signed up for the Dhaka Marathon on a whim after a friend sent me the link at midnight and I made a decision I would regret for the next three months of training.</p><p>The race itself was something else. Thousands of people moving through the city at dawn, before the traffic appears, seeing Dhaka as it rarely lets itself be seen — quiet, wide, almost peaceful. I finished in 4 hours 22 minutes, which is nothing remarkable except to me.</p><p>I have signed up for next year. This time I will actually follow the training plan.</p>',
            ],
        ],
    ];

    public function run(): void
    {
        // ── Step 1: roles & permissions ───────────────────────────────────────
        $this->call(RolePermissionSeeder::class);

        $editorRole = Role::where('name', 'editor')->first();

        // ── Step 2: categories ────────────────────────────────────────────────
        $categories = [];
        foreach ($this->categories as $name) {
            $categories[] = Category::firstOrCreate(['name' => $name]);
        }

        // ── Step 3: 100 users ─────────────────────────────────────────────────
        foreach ($this->names as $index => $fullName) {
            /*
             * username = first name lowercase + last name initial + index
             * e.g. "Arif Hossain" → "arif_h_1"
             * ensures uniqueness across 100 users
             */
            $parts      = explode(' ', $fullName);
            $first      = Str::lower($parts[0]);
            $lastInit   = Str::lower(substr($parts[1] ?? 'x', 0, 1));
            $username   = $first . '_' . $lastInit . '_' . ($index + 1);
            $subDomain  = Str::slug($username);
            $email      = $username . '@example.com';
            $password   = $username . '_1235';

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name'       => $fullName,
                    'username'   => $username,
                    'sub_domain' => $subDomain,
                    'password'   => Hash::make($password),
                ]
            );

            // assign editor role if no role yet
            if ($user->wasRecentlyCreated && $user->roles->isEmpty()) {
                $user->assignRole($editorRole);
            }

            // ── Step 4: 10–15 articles per user ───────────────────────────────
            $articleCount = rand(10, 15);
            $categoryKeys = array_keys($this->articlePool);

            for ($i = 0; $i < $articleCount; $i++) {
                // pick a random category
                $categoryKey  = $categoryKeys[array_rand($categoryKeys)];
                $pool         = $this->articlePool[$categoryKey];
                $template     = $pool[array_rand($pool)];
                $category     = collect($categories)->firstWhere('name', $categoryKey);

                // vary the title slightly to avoid exact duplicates
                $titleSuffix  = $i > 0 ? ' (Part ' . ($i + 1) . ')' : '';

                Article::create([
                    'title'       => $template['title'] . $titleSuffix,
                    'content'     => $template['body'],
                    'user_id'     => $user->id,
                    'category_id' => $category?->id,
                ]);
            }
        }
    }
}
