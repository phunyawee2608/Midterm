<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำอธิบายการสอบกลางภาค</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kanit', sans-serif; }
        /* Dropdown style */
        .dropdown:hover .dropdown-menu {
            display: block;
            animation: fadeIn 0.2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen text-gray-700">

    <nav class="bg-white/90 backdrop-blur-md text-gray-700 p-4 sticky top-0 z-50 shadow-sm border-b border-emerald-100">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="flex items-center gap-3">
                <div class="bg-emerald-500 p-1.5 rounded-lg shadow-md text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide uppercase text-emerald-700">Midterm Exam</span>
            </div>
            
            <div class="hidden md:flex gap-8 text-sm font-medium items-center">
                <a href="#" class="text-emerald-600 border-b-2 border-emerald-500 pb-1">คำอธิบาย</a>
                
                <div class="relative dropdown group">
                    <a href="#" class="hover:text-emerald-600 transition flex items-center gap-1 py-2 text-gray-600">
                        การเขียนโปรแกรมแบบมีเงื่อนไข 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div class="dropdown-menu absolute hidden bg-white text-gray-700 rounded-xl shadow-xl w-56 mt-0 py-2 border border-emerald-100">
                        <a href="w01.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100">ข้อที่ 1.1 (20 คะแนน)</a>
                        <a href="w02.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100">ข้อที่ 1.2 (20 คะแนน)</a>
                        <a href="w03.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100 text-sm">ข้อที่ 1.3 (10 คะแนน)</a>
                        <a href="w04.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100 text-sm">ข้อที่ 1.4 (10 คะแนน)</a>
                        <a href="w05.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100 text-sm">ข้อที่ 1.5 (10 คะแนน)</a>
                        <a href="w06.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition text-sm">ข้อที่ 1.6 (10 คะแนน)</a>
                    </div>
                </div>

                <div class="relative dropdown group">
                    <a href="#" class="hover:text-emerald-600 transition flex items-center gap-1 py-2 text-gray-600">
                        เขียนโปรแกรมวนซ้ำ
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div class="dropdown-menu absolute hidden bg-white text-gray-700 rounded-xl shadow-xl w-56 mt-0 py-2 border border-emerald-100">
                         <a href="w07.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100">ข้อที่ 2.1 (10 คะแนน)</a>
                         <a href="w08.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100">ข้อที่ 2.2 (10 คะแนน)</a>
                         <a href="w09.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100">ข้อที่ 2.3 (10 คะแนน)</a>
                         <a href="w10.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100">ข้อที่ 2.4 (10 คะแนน)</a>
                         <a href="w11.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100">ข้อที่ 2.5 (10 คะแนน)</a>
                         <a href="w12.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition border-b border-gray-100">ข้อที่ 2.6 (20 คะแนน)</a>
                         <a href="w13.php" class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700 transition">ข้อที่ 2.7 (30 คะแนน)</a>  
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-12 px-4">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden max-w-5xl mx-auto border border-emerald-50">
            
            <div class="p-8 text-center border-b border-gray-100">
                <h1 class="text-3xl font-bold text-emerald-600 mb-8 uppercase tracking-widest">คำอธิบายการสอบกลางภาค</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left bg-emerald-50/50 p-6 rounded-2xl border border-emerald-100">
                    <div class="space-y-2 text-gray-600">
                        <p><span class="font-semibold text-emerald-700">สอบกลางภาค:</span> ภาคเรียนที่ 2/2567</p>
                        <p><span class="font-semibold text-emerald-700">รหัสวิชา:</span> 31910-2011</p>
                        <p><span class="font-semibold text-emerald-700">แผนกสาขาวิชา:</span> เทคโนโลยีธุรกิจดิจิทัล</p>
                    </div>
                    <div class="space-y-2 text-gray-600">
                        <p><span class="font-semibold text-emerald-700">วิชา:</span> การพัฒนาเว็บไซต์ทางธุรกิจ</p>
                        <p><span class="font-semibold text-emerald-700">ครูผู้สอน:</span> กิตติชัย ทองดี</p>
                        <p><span class="font-semibold text-emerald-700">วิทยาลัย:</span> วิทยาลัยเทคนิคสระบุรี</p>
                        <p><span class="font-semibold text-emerald-700">นักเรียนผู้ติด มส.:</span>น.ส.ปุณยวีร์ จันลา</p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gradient-to-r from-emerald-50 to-white text-center border-b border-gray-100">
                <p class="text-gray-600">
                    กรุณาเลือกทำข้อสอบตามหัวข้อด้านล่างตามลำดับ หรือเลือกทำเฉพาะข้อที่สนใจ
                </p>
                <p class="text-sm mt-2 text-gray-500">
                    โดยต้องเลือกทำ <span class="text-emerald-600 font-bold bg-emerald-100 px-2 py-0.5 rounded">"เงื่อนไข" 20 คะแนน</span> 
                    และ <span class="text-emerald-600 font-bold bg-emerald-100 px-2 py-0.5 rounded">"วนซ้ำ" 20 คะแนน</span>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-gray-100">
                
                <div class="p-8 hover:bg-gray-50 transition group/sec">
                    <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="bg-emerald-500 text-white w-8 h-8 flex items-center justify-center rounded-full font-bold shadow-md shadow-emerald-200">1</span>
                        แบบมีเงื่อนไข <span class="text-emerald-600 text-sm font-normal">(20 คะแนน)</span>
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between items-center group">
                            <a href="w01.php" class="text-gray-500 group-hover:text-emerald-600 transition">1. คำนวณเงินเดือนพนักงาน</a>
                            <span class="text-[10px] bg-emerald-100 text-emerald-700 border border-emerald-200 px-2 py-1 rounded-full font-bold">20 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w02.php" class="text-gray-500 group-hover:text-emerald-600 transition">2. คำนวณภาษีรถยนต์</a>
                            <span class="text-[10px] bg-emerald-100 text-emerald-700 border border-emerald-200 px-2 py-1 rounded-full font-bold">20 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w03.php" class="text-gray-500 group-hover:text-emerald-600 transition">3. คำนวณค่าไฟฟ้า</a>
                            <span class="text-[10px] bg-gray-100 text-gray-400 border border-gray-200 px-2 py-1 rounded-full">10 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w04.php" class="text-gray-500 group-hover:text-emerald-600 transition">4. คำนวณค่าแรงพนักงาน</a>
                            <span class="text-[10px] bg-gray-100 text-gray-400 border border-gray-200 px-2 py-1 rounded-full">10 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w05.php" class="text-gray-500 group-hover:text-emerald-600 transition">5. คำนวณค่าบริการเน็ต</a>
                            <span class="text-[10px] bg-gray-100 text-gray-400 border border-gray-200 px-2 py-1 rounded-full">10 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w06.php" class="text-gray-500 group-hover:text-emerald-600 transition">6. เช็คเลขคู่หรือเลขคี่</a>
                            <span class="text-[10px] bg-gray-100 text-gray-400 border border-gray-200 px-2 py-1 rounded-full">10 pts</span>
                        </li>
                    </ul>
                </div>

                <div class="p-8 hover:bg-gray-50 transition group/sec">
                    <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="bg-gray-700 text-white w-8 h-8 flex items-center justify-center rounded-full font-bold shadow-md">2</span>
                        แบบวนซ้ำ <span class="text-gray-500 text-sm font-normal">(20 คะแนน)</span>
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between items-center group">
                            <a href="w07.php" class="text-gray-500 group-hover:text-emerald-600 transition">1. คำนวณผลรวมเลขคู่</a>
                            <span class="text-[10px] bg-gray-100 text-gray-400 border border-gray-200 px-2 py-1 rounded-full">10 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w08.php" class="text-gray-500 group-hover:text-emerald-600 transition">2. คำนวณผลคูณตัวเลข</a>
                            <span class="text-[10px] bg-gray-100 text-gray-400 border border-gray-200 px-2 py-1 rounded-full">10 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w09.php" class="text-gray-500 group-hover:text-emerald-600 transition">3. สูตรคูณ</a>
                            <span class="text-[10px] bg-gray-100 text-gray-400 border border-gray-200 px-2 py-1 rounded-full">10 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w10.php" class="text-gray-500 group-hover:text-emerald-600 transition">4. รูปแบบตัวเลขสามเหลี่ยม</a>
                            <span class="text-[10px] bg-gray-100 text-gray-400 border border-gray-200 px-2 py-1 rounded-full">10 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w11.php" class="text-gray-500 group-hover:text-emerald-600 transition">5. ดาวแบบพีระมิด</a>
                            <span class="text-[10px] bg-gray-100 text-gray-400 border border-gray-200 px-2 py-1 rounded-full">10 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w12.php" class="text-gray-500 group-hover:text-emerald-600 transition font-medium">6. คำนวณเลขยกกำลัง</a>
                            <span class="text-[10px] bg-emerald-100 text-emerald-700 border border-emerald-200 px-2 py-1 rounded-full font-bold">20 pts</span>
                        </li>
                        <li class="flex justify-between items-center group">
                            <a href="w13.php" class="text-gray-500 group-hover:text-emerald-600 transition font-medium">7. ค้นหาจำนวนเฉพาะ</a>
                            <span class="text-[10px] bg-emerald-600 text-white px-2 py-1 rounded-full font-bold shadow-sm shadow-emerald-200">30 pts</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <footer class="mt-8 text-center text-gray-400 text-sm">
            © 2024 Midterm Examination | Digital Business Technology
            <br>
            <span class="text-emerald-600/70 font-medium">สงวนสิทธิ์ให้ นางสาวปุณยวีร์ จันลา</span>
        </footer>
    </div>

</body>
</html>