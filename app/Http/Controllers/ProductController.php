<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'ตะกร้อ พวง คละสี',
         'description' =>  "- หนาแน่น- ไม่ย้วยง่าย
                            - ขนาดและน้ำหนักได้มาตรฐานสากล",
         'price' => 150,
         'image' => 'https://www.dohome.co.th/media/catalog/product/cache/e446f15aaa8dc66b80b7a0df334f7c5a/1/0/10022585_ea_1200_1_1_2.jpg'],
        ['id' => 2, 'name' => 'MOLTEN ลูกบาสเกตบอล เบอร์ 7 ',
        'description' => '- ผลิตจากยางสังเคราะห์ BUTYL 100% คุณภาพสูง พันด้วย Nylon
                         - จับกระชับมือ แข็งแรงทนทาน อายุการใช้งานยาวนาน
                         - ขนาดและน้ำหนักได้มาตรฐาน
                         - เบอร์ 7
                         - เส้นรอบวง 7
                         - 9
                         - 78 เซนติเมตร
                         - น้ำหนัก 567
                        - 650 กรัม',
        'price' => 300,
        'image' => 'https://www.dohome.co.th/media/catalog/product/cache/e446f15aaa8dc66b80b7a0df334f7c5a/1/0/10201405_ea_1200_1.jpg'],
        ['id' => 3, 'name' => 'HARSON ลูกฟุตบอล ขาวดำ เบอร์ 5',
        'description' => '- ผลิตจากหนังผลิตด้วยหนัง PU (Polyurethane) คุณภาพดี ไม่ดูดซับน้ำ
                          - ขนาดและน้ำหนักฟุตบอลได้มาตรฐาน
                          - สามารถทนต่อแรงกระแทกได้ดี มีความแข็งแรงทนทาน
                          - มีความยืดหยุ่น สัมผัสนุ่มและหนาแน่น
                          - เหมาะสำหรับฝึกซ้อมและแข่งขัน
                          - สามารถเล่นได้ทุกเพศทุกวัย',
        'price' => 500,
        'image' => 'https://www.dohome.co.th/media/catalog/product/cache/e446f15aaa8dc66b80b7a0df334f7c5a/1/0/10127800_ea_1200_1_6.jpg'],
        ['id' => 4, 'name' => 'GRAND SPORT ลูกวอลเลย์บอล ',
        'description' => '- ผลิตจากหนังอัด PU คุณภาพดี ไม่ดูดซับน้ำ
                          - ขนาดและน้ำหนักวอลเลย์บอลได้มาตรฐาน
                          - แข็งแรงทนทาน สามารถทนต่อแรงกระแทกได้ดี
                          - มีความยืดหยุ่น สัมผัสนุ่มและหนาแน่น
                          - สามารถเล่นได้ทุกเพศทุกวัย',
        'price' => 99.99,
        'image' => 'https://www.dohome.co.th/media/catalog/product/cache/e446f15aaa8dc66b80b7a0df334f7c5a/1/0/10199307_ea_1200_1_2.jpg'],
        ['id' => 5, 'name' => 'D-NEX ไม้แบดมินตันเดี่ยว รุ่น 929',
        'description' => '- ผลิตจากอลูมิเนียมคุณภาพดี มีความแข็งแรงทนทาน
                          - เส้นเอ็นมีความยืดหยุ่นไม่ขาดง่าย
                          - ด้ามจับกระชับถนัดมือสามารถคอนโทรลลูกได้อย่างแม่นยำ
                          - น้ำหนักเบา สะดวกต่อการพกพา
                          _ สามารถใช้งานได้ยาวนาน คุ้มค่า',
        'price' => 49.99,
        'image' => 'https://www.dohome.co.th/media/catalog/product/cache/e446f15aaa8dc66b80b7a0df334f7c5a/1/0/10074553_ea_1200_1_9.jpg'],
        ['id' => 6, 'name' => 'NINJA ไม้แบดมินตันคู่ รุ่น AF-510',
        'description' => '- ผลิตจากอลูมิเนียมคุณภาพดี มีความแข็งแรงทนทาน
                          - เส้นเอ็นมีความยืดหยุ่นไม่ขาดง่าย
                          - ด้ามจับกระชับถนัดมือสามารถคอนโทรลลูกได้อย่างแม่นยำ
                          - น้ำหนักเบา สะดวกต่อการพกพา
                          - สามารถใช้งานได้ยาวนาน คุ้มค่า',
        'price' => 10.00,
        'image' => 'https://www.dohome.co.th/media/catalog/product/cache/e446f15aaa8dc66b80b7a0df334f7c5a/1/0/10075796_p_1200_1_1.jpg'],
        ['id' => 7, 'name' => 'S.K.A ลูกขนไก่จุกโฟม (แพ็ค 6)',
        'description' => '- ลูกขนไก่ทำจากวัสดุที่ได้คุณภาพ
                          - ไม่หลุดง่าย
                          - ทนต่อแรงกระทบได้อย่างดี',
        'price' => 20.00,
        'image' => 'https://www.dohome.co.th/media/catalog/product/cache/e446f15aaa8dc66b80b7a0df334f7c5a/1/0/10151637_p_1200_1_1.jpg'],
        ['id' => 8, 'name' => 'นวมมวย PU 6 ออนซ์',
        'description' => '- ผลิตจากวัสดุหนัง PU คุณภาพสูงผิวไม่ลอกหรือฉีกขาดง่าย
                          - ภายในบุด้วยฟองน้ำไม่ดูดซับน้ำจึงไม่มีกลิ่นอับ
                          - แถบรัดแบบเวลโครปรับให้กระชับมือสวมใส่และถอดง่าย
                          - ทนต่อแรงกระแทกจากการชกต่อยได้ดี
                          - สามารถใช้งานยาวนาน
                          - ขนาดได้มาตรฐาน ใช้งานง่าย',
        'price' => 5.00,
        'image' => 'https://www.dohome.co.th/media/catalog/product/cache/e446f15aaa8dc66b80b7a0df334f7c5a/1/0/10018056_paa_1200_1.jpg'],
        ['id' => 9, 'name' => 'เป้าล่อมวย หนังเทียม',
        'description' => '- ทำจากวัสดุอย่างดี
                          - งานเย็บด้วยความปราณีต แน่นหนา
                          - ขนาดและน้ำหนักได้มาตรฐาน
                          - วัสดุทำจากหนัง PU',
        'price' => 15.00,
        'image' => 'https://www.dohome.co.th/media/catalog/product/cache/e446f15aaa8dc66b80b7a0df334f7c5a/1/0/10034633_ea_1200_1.jpg'],
        ['id' => 10, 'name' => 'กระดานปาเป้า 15 นิ้ว',
        'description' => '-เป้ากระดานมีความแข็งแรง ทนทาน
                          - ไม่เปราะ และแตกหักง่าย',
        'price' => 30.00,
        'image' => 'https://www.dohome.co.th/media/catalog/product/cache/e446f15aaa8dc66b80b7a0df334f7c5a/1/0/10036478_ea_1200_1_2.jpg'],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);
    }


    //สร้างหน้า create
    public function create()
    {
        return Inertia::render('Products/Create');
    }

    /**
     * Store a newly created resource in storage.
     *///เพิ่มรูปใน create
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = collect($this->products)->firstWhere('id', $id);
        if (!$product) {
            abort(404, 'Product not found');
        }
        return Inertia::render('Products/Show', ['product' => $product]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
