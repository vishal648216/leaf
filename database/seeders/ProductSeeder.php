<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin & Test User
        User::firstOrCreate(
            ['email' => 'admin@leafndawn.com'],
            [
                'name' => 'Leaf N Dawn Admin',
                'password' => Hash::make('Admin@12345'),
                'role' => 'admin',
                'phone' => '+91 92110 50888',
            ]
        );

        User::firstOrCreate(
            ['email' => 'customer@leafndawn.com'],
            [
                'name' => 'Mayur Customer',
                'password' => Hash::make('User@12345'),
                'role' => 'customer',
                'phone' => '+91 98765 43210',
            ]
        );

        // 2. Categories
        $catDetox = Category::updateOrCreate(
            ['slug' => 'slimming-detox'],
            [
                'name' => 'Slimming & Detox',
                'description' => 'Targeted botanical formulations for cleansing, metabolism and digestive lightness.',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        $catWellness = Category::updateOrCreate(
            ['slug' => 'wellness-health'],
            [
                'name' => 'Wellness & Blood Sugar',
                'description' => 'Therapeutic herbal infusions crafted to support metabolic balance and immune vigor.',
                'is_active' => true,
                'sort_order' => 2,
            ]
        );

        $catClassic = Category::updateOrCreate(
            ['slug' => 'classic-spiced-teas'],
            [
                'name' => 'Classic Spiced Teas',
                'description' => 'Authentic Assam CTC blended with fresh whole Indian spices for rich soul-warming flavor.',
                'is_active' => true,
                'sort_order' => 3,
            ]
        );

        // 3. Products
        Product::updateOrCreate(
            ['slug' => 'aureva-slimming-detox'],
            [
                'category_id' => $catDetox->id,
                'name' => 'AUREVA — Slimming & Detox Herbal Tea',
                'sku' => 'LND-AUR-01',
                'tagline' => "Nature's Pure Cleansing Blend",
                'short_description' => 'Expertly crafted with 17 handpicked Ayurvedic botanicals including Oolong, Green Tea, Moringa, Tulsi and Ginger. Designed to naturally accelerate metabolism and promote deep detoxification.',
                'description' => 'Aureva is our signature detox blend formulated to awaken your body’s innate vitality. Carefully harmonized using ancient Ayurvedic wisdom and modern clinical validation, each biodegradable pyramid bag releases potent polyphenols and aromatherapeutic terpenes without bitterness.',
                'ingredients' => 'Oolong Tea, Premium Green Tea, Peppermint, Spearmint, Ceylon Cinnamon, Licorice, Holy Basil (Tulsi), Sun-dried Ginger, Jasmine Flowers, Moringa Oleifera, Lemongrass, Fennel Seeds, Cardamom, Rooibos, Rose Petals, Black Pepper, Clove.',
                'benefits' => 'Boosts Daily Metabolism & Calorie Burn | 100% Natural Detoxification | Flushes Stagnant Toxins & Reduces Bloating | Rich in Catechins & Polyphenols | Smooth Refreshing Mint Aroma',
                'brewing_guide' => 'Boil fresh filtered water to 85°C-90°C. Steep 1 pyramid bag in 200ml for 3 to 4 minutes. Savor warm or chilled with a drop of raw honey.',
                'main_image' => 'assets/images/aureva_pouch.jpg',
                'price' => 549.00,
                'mrp' => 699.00,
                'stock' => 150,
                'total_bags' => 20,
                'herb_count' => 17,
                'theme_color' => '#3A7D44',
                'is_active' => true,
                'is_featured' => true,
                'avg_rating' => 4.9,
                'total_reviews' => 142,
                'meta_title' => 'AUREVA Slimming & Detox Herbal Tea — Leaf N Dawn',
                'meta_description' => 'Shop 100% natural Aureva Detox Tea with 17 Ayurvedic herbs. Accelerate metabolism, relieve bloating and feel revitalized every morning.',
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'sugara-blood-sugar-care'],
            [
                'category_id' => $catWellness->id,
                'name' => 'SUGARA — Blood Sugar Care Herbal Tea',
                'sku' => 'LND-SUG-02',
                'tagline' => 'Natural Glycemic Balance & Vitality',
                'short_description' => 'A synergistic blend of 14 potent medicinal herbs including Karela, Jamun seed, Gudmar, Cinnamon and Fenugreek to support healthy glucose levels and insulin sensitivity.',
                'description' => 'Sugara is meticulously formulated for proactive glycemic management. Drawing on time-tested botanical remedies, Sugara provides daily metabolic nourishment without compromising on smooth, earth-kissed taste.',
                'ingredients' => 'Gudmar (Gymnema Sylvestre), Bitter Melon (Karela), Jamun Seed, Ceylon Cinnamon, Fenugreek (Methi), Vijayasar, Amla, Giloy, Banaba Leaf, Green Tea, Holy Basil (Tulsi), Cardamom, Fennel.',
                'benefits' => 'Helps Regulate Blood Glucose | Supports Healthy Pancreatic Function | Curbs Unhealthy Sugar Cravings | Powerful Antioxidant Defense | 100% Caffeine Free & Gentle',
                'brewing_guide' => 'Infuse 1 tea bag in 200ml freshly boiled water for 4-5 minutes. Best consumed twice daily 30 minutes before principal meals.',
                'main_image' => 'assets/images/sugara_pouch.jpg',
                'price' => 599.00,
                'mrp' => 749.00,
                'stock' => 120,
                'total_bags' => 20,
                'herb_count' => 14,
                'theme_color' => '#C0392B',
                'is_active' => true,
                'is_featured' => true,
                'avg_rating' => 4.8,
                'total_reviews' => 98,
                'meta_title' => 'SUGARA Blood Sugar Support Tea — Leaf N Dawn',
                'meta_description' => '14 herbal botanicals formulated for glycemic balance. Pure, organic and naturally restorative Ayurvedic tea.',
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'masala-chai-spice-blend'],
            [
                'category_id' => $catClassic->id,
                'name' => 'MASALA CHAI — Royal Heritage Spice Blend',
                'sku' => 'LND-MAS-03',
                'tagline' => 'Rich, Bold & Soul-Warming',
                'short_description' => 'Single-origin Assam CTC harmonized with 5 whole aromatic spices—Crushed Ginger, Malabar Cardamom, Ceylon Cinnamon, Clove and Black Peppercorn.',
                'description' => 'Leaf N Dawn’s Masala Chai is an authentic tribute to India’s grand chai tradition. We combine brisk, malty Assam whole leaves with hand-crushed aromatic spices to deliver a bold cup bursting with warmth, vitality and immune strength.',
                'ingredients' => 'Estate Assam CTC Black Tea, Sun-Dried Crushed Ginger, Malabar Green Cardamom, Ceylon Cinnamon Quills, Fragrant Cloves, Tellicherry Black Peppercorns, Nutmeg.',
                'benefits' => 'Invigorating Natural Awakening | Enhances Digestive Fire (Agni) | Soothes Seasonal Throat Irritation | 100% Pure Spices with No Artificial Flavors',
                'brewing_guide' => 'Simmer in equal parts fresh milk and water for 4-5 minutes until deeply caramelized. Strain and sweeten with jaggery or raw sugar.',
                'main_image' => 'assets/images/masala_chai_pouch.jpg',
                'price' => 399.00,
                'mrp' => 499.00,
                'stock' => 200,
                'total_bags' => 25,
                'herb_count' => 5,
                'theme_color' => '#6B2737',
                'is_active' => true,
                'is_featured' => true,
                'avg_rating' => 4.95,
                'total_reviews' => 215,
                'meta_title' => 'Royal Masala Chai Blend — Leaf N Dawn',
                'meta_description' => 'Brisk Assam black tea infused with 5 whole hand-crushed spices. Authentic, aromatic and revitalizing.',
            ]
        );
    }
}
