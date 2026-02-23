<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1.6 เช็คเลขคู่หรือเลขคี่ - Green Theme</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* --- ชุดสี Green Finance --- */
        :root {
            --primary-color: #059669;   /* สีเขียวหลัก */
            --secondary-color: #047857; /* สีเขียวเข้ม */
            --light-accent: #ecfdf5;    /* สีพื้นหลังอ่อนๆ */
            --bg-color: #f3f4f6;        /* สีพื้นหลัง body */
            --text-dark: #1f2937;       /* สีข้อความ */
            --text-muted: #6b7280;      /* สีข้อความรอง */
            
            /* สีสำหรับผลลัพธ์ */
            --res-even-bg: #dcfce7;     /* พื้นหลังสีเขียวอ่อน (เลขคู่) */
            --res-even-text: #166534;   /* ตัวหนังสือเขียวเข้ม (เลขคู่) */
            --res-even-border: #86efac; /* เส้นขอบเขียว (เลขคู่) */
            
            --res-odd-bg: #fee2e2;      /* พื้นหลังสีแดงอ่อน (เลขคี่) */
            --res-odd-text: #991b1b;    /* ตัวหนังสือแดงเข้ม (เลขคี่) */
            --res-odd-border: #fca5a5;  /* เส้นขอบแดง (เลขคี่) */
        }

        body {
            font-family: 'Kanit', sans-serif;
            background-color: var(--bg-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        /* Container หลัก แบ่ง 2 ฝั่ง */
        .main-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 900px;
            display: flex;
            overflow: hidden;
        }

        /* --- ฝั่งซ้าย: ฟอร์ม --- */
        .form-section {
            flex: 1;
            padding: 40px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
        }

        h2 { 
            margin-top: 0; 
            color: var(--text-dark); 
            font-size: 24px;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .form-group { margin-bottom: 25px; }

        label { 
            display: block; 
            margin-bottom: 10px; 
            font-weight: 500;
            color: var(--text-dark);
        }

        input {
            width: 100%;
            padding: 14px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            outline: none;
            transition: 0.2s;
            box-sizing: border-box;
            font-family: 'Kanit', sans-serif;
            color: var(--text-dark);
        }

        input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.1);
        }

        .btn-group {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        button {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: 0.3s;
            font-family: 'Kanit', sans-serif;
        }

        .btn-check { 
            background-color: var(--primary-color);
            color: white; 
        }

        .btn-check:hover { 
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .btn-clear { 
            background-color: #e5e7eb; 
            color: var(--text-muted); 
        }
        .btn-clear:hover { 
            background-color: #d1d5db; 
            color: var(--text-dark);
        }

        /* --- ฝั่งขวา: คำอธิบาย (Green Theme) --- */
        .info-section {
            flex: 1;
            padding: 40px;
            /* ไล่สีเขียว */
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .info-section h3 {
            font-size: 26px;
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }

        .info-desc {
            text-align: center;
            margin-bottom: 30px;
            line-height: 1.6;
            opacity: 0.95;
            font-weight: 300;
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0 auto;
            display: inline-block;
            width: 100%;
        }

        .info-list li {
            margin-bottom: 15px;
            background: rgba(255, 255, 255, 0.15);
            padding: 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
        }

        .dot {
            height: 10px;
            width: 10px;
            background-color: white;
            border-radius: 50%;
            display: inline-block;
            margin-right: 15px;
        }

        /* --- ส่วนแสดงผลลัพธ์ --- */
        #result-display {
            margin-top: 25px;
            padding: 20px;
            border-radius: 15px;
            display: none;
            animation: bounceIn 0.5s ease;
            text-align: center;
        }

        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.9); }
            70% { transform: scale(1.02); }
            100% { opacity: 1; transform: scale(1); }
        }

        .res-text { font-size: 22px; font-weight: bold; margin-bottom: 5px; }
        .res-sub { font-size: 16px; opacity: 0.9; }

        /* สีผลลัพธ์ (Custom colors match theme) */
        .even-style {
            background-color: var(--res-even-bg);
            color: var(--res-even-text);
            border: 2px solid var(--res-even-border);
        }

        .odd-style {
            background-color: var(--res-odd-bg);
            color: var(--res-odd-text);
            border: 2px solid var(--res-odd-border);
        }

        /* Responsive */
        @media (max-width: 800px) {
            .main-card { flex-direction: column; }
            .info-section { order: 1; padding: 30px; }
        }
    </style>
</head>
<body>

<div class="main-card">
    <div class="form-section">
        <h2>1.6 เช็คเลขคู่หรือเลขคี่</h2>
        
        <div class="form-group">
            <label>กรอกตัวเลข</label>
            <input type="number" id="numberInput" placeholder="กรอกตัวเลขที่ต้องการตรวจสอบ">
        </div>

        <div class="btn-group">
            <button class="btn-check" onclick="checkNumber()">ตรวจสอบ</button>
            <button class="btn-clear" onclick="clearAll()">เคลียร์ผลลัพธ์</button>
        </div>

        <div id="result-display"></div>
    </div>

    <div class="info-section">
        <h3>วิธีการตรวจสอบ</h3>
        <p class="info-desc">โปรแกรมจะตรวจสอบตัวเลขที่กรอกว่าเป็นเลขคู่หรือเลขคี่ โดยมีวิธีการดังนี้:</p>
        
        <ul class="info-list">
            <li>
                <span class="dot"></span>
                <span><strong>เลขคู่ :</strong> หารด้วย 2 ลงตัว</span>
            </li>
            <li>
                <span class="dot"></span>
                <span><strong>เลขคี่ :</strong> หารด้วย 2 ไม่ลงตัว</span>
            </li>
        </ul>
    </div>
</div>

<script>
    function checkNumber() {
        const input = document.getElementById('numberInput');
        const display = document.getElementById('result-display');
        const num = parseInt(input.value);

        if (input.value === "" || isNaN(num)) {
            alert("โปรดกรอกตัวเลขก่อนตรวจสอบครับ");
            return;
        }

        display.style.display = "block";
        display.classList.remove('even-style', 'odd-style');

        if (num % 2 === 0) {
            // กรณีเลขคู่ (สีเขียว)
            display.classList.add('even-style');
            display.innerHTML = `
                <div class="res-text">เลข ${num} คือ "เลขคู่"</div>
                <div class="res-sub">เพราะหารด้วย 2 ลงตัว (เหลือเศษ 0)</div>
            `;
        } else {
            // กรณีเลขคี่ (สีแดง)
            display.classList.add('odd-style');
            display.innerHTML = `
                <div class="res-text">เลข ${num} คือ "เลขคี่"</div>
                <div class="res-sub">เพราะหารด้วย 2 ไม่ลงตัว (เหลือเศษ 1)</div>
            `;
        }
    }

    function clearAll() {
        document.getElementById('numberInput').value = '';
        document.getElementById('result-display').style.display = "none";
    }
</script>

</body>
</html>