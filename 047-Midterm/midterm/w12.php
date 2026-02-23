<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.6 คำนวณเลขยกกำลัง - Green Theme</title>
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

        /* Card หลัก แบ่ง 2 ฝั่ง */
        .main-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 950px;
            display: flex;
            overflow: hidden;
        }

        /* --- ฝั่งซ้าย: ฟอร์ม --- */
        .form-section {
            flex: 1;
            padding: 50px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 { 
            margin-top: 0; 
            color: var(--text-dark); 
            font-size: 26px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-group { margin-bottom: 25px; }

        label { 
            display: block; 
            margin-bottom: 10px; 
            font-weight: 500;
            color: var(--text-dark);
            font-size: 16px;
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
            gap: 15px;
            margin-top: 20px;
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

        .btn-calc { 
            background-color: var(--primary-color); 
            color: white; 
        }

        .btn-calc:hover { 
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
            padding: 50px;
            /* Gradient สีเขียว */
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .info-section h3 {
            font-size: 28px;
            margin-top: 0;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .info-desc {
            margin-bottom: 30px;
            line-height: 1.6;
            opacity: 0.95;
            font-weight: 300;
            font-size: 16px;
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0 auto;
            display: inline-block;
            text-align: left;
        }

        .info-list li {
            margin-bottom: 15px;
            background: rgba(255, 255, 255, 0.15);
            padding: 15px 20px;
            border-radius: 10px;
            display: flex;
            align-items: flex-start;
        }
        
        .info-list li::before {
            content: "•";
            margin-right: 12px;
            font-weight: bold;
            font-size: 20px;
            color: rgba(255,255,255,0.9);
        }

        /* --- ส่วนแสดงผลลัพธ์ --- */
        #result-display {
            margin-top: 25px;
            padding: 20px;
            background-color: var(--light-accent);
            border-radius: 12px;
            border: 2px dashed var(--primary-color);
            display: none;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .res-label { font-size: 14px; color: var(--text-muted); margin-bottom: 5px; }
        .res-value { font-size: 24px; color: var(--primary-color); font-weight: bold; word-break: break-all; }

        /* Responsive */
        @media (max-width: 850px) {
            .main-card { flex-direction: column; }
            .info-section { padding: 30px; order: -1; }
            .info-section { order: 1; }
        }
    </style>
</head>
<body>

<div class="main-card">
    <div class="form-section">
        <h2>2.6 คำนวณเลขยกกำลัง</h2>
        
        <div class="form-group">
            <label>ฐาน (Base)</label>
            <input type="number" id="baseInput" placeholder="กรอกฐาน (เช่น 2, 5)">
        </div>

        <div class="form-group">
            <label>เลขชี้กำลัง (Exponent)</label>
            <input type="number" id="expInput" placeholder="กรอกเลขชี้กำลัง (เช่น 3, -2)">
        </div>

        <div class="btn-group">
            <button class="btn-calc" onclick="calculatePower()">คำนวณ</button>
            <button class="btn-clear" onclick="clearData()">เคลียร์ผลลัพธ์</button>
        </div>

        <div id="result-display">
            <div class="res-label">ผลลัพธ์การคำนวณ:</div>
            <div id="outputValue" class="res-value"></div>
        </div>
    </div>

    <div class="info-section">
        <h3>วิธีการคำนวณเลขยกกำลัง</h3>
        <p class="info-desc">
            โปรแกรมนี้ใช้วิธีการวนลูปเพื่อคำนวณเลขยกกำลัง รองรับทั้งเลขชี้กำลังบวกและลบ โดยมีเงื่อนไขดังนี้
        </p>
        
        <ul class="info-list">
            <li>หากเลขชี้กำลังเป็นบวก จะคูณฐานซ้ำตามจำนวนที่กำหนด</li>
            <li>หากเลขชี้กำลังเป็นลบ จะคำนวณกลับค่าโดยใช้ 1/ผลลัพธ์</li>
        </ul>
    </div>
</div>

<script>
    function calculatePower() {
        const base = parseFloat(document.getElementById('baseInput').value);
        const exp = parseInt(document.getElementById('expInput').value);
        const display = document.getElementById('result-display');
        const output = document.getElementById('outputValue');

        if (isNaN(base) || isNaN(exp)) {
            alert("กรุณากรอกข้อมูลให้ครบถ้วนครับ");
            return;
        }

        let result = 1;
        const absExp = Math.abs(exp);

        // คำนวณด้วย Loop
        for (let i = 0; i < absExp; i++) {
            result *= base;
        }

        // กรณีเลขชี้กำลังติดลบ
        if (exp < 0) {
            result = 1 / result;
        }

        display.style.display = "block";
        // แสดงผลลัพธ์ (ถ้าทศนิยมเยอะเกินไปให้ตัด)
        output.textContent = exp === 0 ? "1" : result.toLocaleString(undefined, {maximumFractionDigits: 10});
    }

    function clearData() {
        document.getElementById('baseInput').value = '';
        document.getElementById('expInput').value = '';
        document.getElementById('result-display').style.display = "none";
    }
</script>

</body>
</html>