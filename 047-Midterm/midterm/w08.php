<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.2 คำนวณผลคูณของตัวเลข - Green Theme</title>
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
            max-width: 900px;
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
            width: 100%;
        }

        .info-list li {
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.15);
            padding: 20px;
            border-radius: 12px;
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

        .highlight {
            font-weight: bold;
            background: rgba(255,255,255,0.2);
            padding: 2px 6px;
            border-radius: 4px;
        }

        /* --- ส่วนแสดงผลลัพธ์ --- */
        #result-display {
            margin-top: 25px;
            padding: 20px;
            background-color: var(--light-accent);
            border-radius: 12px;
            border-left: 5px solid var(--primary-color);
            display: none;
            animation: slideUp 0.4s ease;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .res-text { font-size: 16px; color: var(--text-dark); margin-bottom: 5px; }
        .res-total { font-size: 24px; color: var(--primary-color); font-weight: bold; word-break: break-all; }

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
        <h2>2.2 คำนวณผลคูณของตัวเลข</h2>
        
        <div class="form-group">
            <label>กรอกจำนวนเต็มบวก (n)</label>
            <input type="number" id="nValue" placeholder="กรอกค่า n" min="1">
        </div>

        <div class="btn-group">
            <button class="btn-calc" onclick="calculateProduct()">คำนวณ</button>
            <button class="btn-clear" onclick="clearAll()">ล้างข้อมูล</button>
        </div>

        <div id="result-display"></div>
    </div>

    <div class="info-section">
        <h3>รายละเอียดโจทย์</h3>
        <p class="info-desc">
            กรอกค่า <span class="highlight">n</span> (จำนวนเต็มบวก) เพื่อคำนวณผลคูณของตัวเลข ตั้งแต่ 1 ถึง <span class="highlight">n</span>
        </p>
        
        <ul class="info-list">
            <li>
                <div>
                    <strong>เงื่อนไขการคำนวณ</strong><br>
                    <span style="font-size: 14px; opacity: 0.9;">คำนวณผลคูณของตัวเลขในช่วง 1 ถึง n<br>โดยค่าของ n ต้องเป็นจำนวนเต็มบวก</span>
                </div>
            </li>
            <li>
                <div>
                    แสดงผลลัพธ์เป็นผลคูณทั้งหมด
                </div>
            </li>
        </ul>
    </div>
</div>

<script>
    function calculateProduct() {
        const input = document.getElementById('nValue');
        const display = document.getElementById('result-display');
        const n = parseInt(input.value);

        if (input.value === "" || isNaN(n) || n < 1) {
            alert("กรุณากรอกจำนวนเต็มที่มากกว่า 0 ครับ");
            return;
        }

        let product = 1;
        
        for (let i = 1; i <= n; i++) {
            product *= i;
        }

        display.style.display = "block";
        display.innerHTML = `
            <div class="res-text">ผลคูณตั้งแต่ 1 ถึง ${n} คือ:</div>
            <div class="res-total">${product.toLocaleString()}</div>
        `;
    }

    function clearAll() {
        document.getElementById('nValue').value = '';
        document.getElementById('result-display').style.display = "none";
    }
</script>

</body>
</html>