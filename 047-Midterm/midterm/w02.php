<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบคำนวณภาษีรถยนต์ - Green Theme</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* --- ชุดสี Green Finance (เหมือนโปรแกรมเงินเดือน) --- */
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
            color: var(--text-dark);
        }

        /* กล่องหลัก แบ่งเป็น 2 ฝั่ง */
        .main-card {
            background: white;
            border-radius: 20px;
            /* ปรับเงาให้เป็นสีโทนกลางๆ หรือเขียวจางๆ */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 950px;
            display: flex;
            overflow: hidden;
        }

        /* --- ฝั่งซ้าย: ฟอร์ม --- */
        .form-section {
            flex: 1;
            padding: 40px;
            background-color: #fff;
        }

        h2 { 
            margin-top: 0; 
            color: var(--text-dark); 
            font-size: 24px;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .form-group { margin-bottom: 20px; }

        label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: 500;
            color: var(--text-dark);
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            transition: 0.2s;
            box-sizing: border-box;
            font-family: 'Kanit', sans-serif;
            color: var(--text-dark);
        }

        input:focus, select:focus {
            border-color: var(--primary-color);
            /* เงาสีเขียวจางๆ */
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1); 
        }

        .btn-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        button {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            font-family: 'Kanit', sans-serif;
            transition: 0.3s;
        }

        .btn-submit { 
            background-color: var(--primary-color); 
            color: white; 
        }
        .btn-submit:hover { 
            background-color: var(--secondary-color); 
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .btn-reset { 
            background-color: #e5e7eb; 
            color: var(--text-muted); 
        }
        .btn-reset:hover { 
            background-color: #d1d5db; 
            color: var(--text-dark);
        }

        /* --- ฝั่งขวา: คำอธิบาย (เปลี่ยนเป็นสีเขียว) --- */
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
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-list li {
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 12px;
            border-left: 4px solid rgba(255, 255, 255, 0.5);
        }

        .info-title {
            font-weight: 600;
            font-size: 18px;
            display: block;
            margin-bottom: 8px;
            text-decoration: underline;
            text-decoration-thickness: 2px;
            text-underline-offset: 4px;
        }

        .info-detail {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.95;
            padding-left: 5px;
            font-weight: 300;
        }

        /* --- ส่วนแสดงผลลัพธ์ --- */
        #result-display {
            margin-top: 25px;
            padding: 20px;
            background-color: var(--light-accent);
            border-radius: 12px;
            display: none;
            border-left: 5px solid var(--primary-color);
            animation: slideUp 0.4s ease;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .res-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 16px;
            color: var(--text-dark);
        }

        .total-row {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px dashed #a7f3d0; /* เส้นประสีเขียวอ่อน */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .res-price { 
            font-size: 24px; 
            color: var(--primary-color); 
            font-weight: bold; 
        }

        /* Responsive */
        @media (max-width: 850px) {
            .main-card { flex-direction: column; }
            .info-section { padding: 30px; }
        }
    </style>
</head>
<body>

<div class="main-card">
    <div class="form-section">
        <h2>1.2 คำนวณภาษีรถยนต์</h2>
        
        <div class="form-group">
            <label>ขนาด CC ของรถยนต์</label>
            <input type="number" id="ccInput" placeholder="กรอกจำนวน CC (เช่น 1600)">
        </div>

        <div class="form-group">
            <label>ประเภทของรถยนต์</label>
            <select id="carType">
                <option value="private">รถยนต์ส่วนบุคคล</option>
                <option value="pickup">รถกระบะ</option>
            </select>
        </div>

        <div class="form-group">
            <label>อายุของรถยนต์ (ปี)</label>
            <input type="number" id="ageInput" placeholder="กรอกอายุรถยนต์ (เช่น 4)">
        </div>

        <div class="btn-group">
            <button class="btn-submit" onclick="calculateTax()">คำนวณภาษี</button>
            <button class="btn-reset" onclick="resetPage()">เคลียร์ผลลัพธ์</button>
        </div>

        <div id="result-display"></div>
    </div>

    <div class="info-section">
        <h3>โปรแกรมคำนวณภาษีรถยนต์</h3>
        <ul class="info-list">
            <li>
                <span class="info-title">รถยนต์ส่วนบุคคล</span>
                <div class="info-detail">
                    • CC ไม่เกิน 1,500 : 500 บาท<br>
                    • CC 1,501 - 2,000 : 1,000 บาท<br>
                    • CC มากกว่า 2,000 : 1,500 บาท
                </div>
            </li>
            <li>
                <span class="info-title">รถกระบะ</span>
                <div class="info-detail">
                    • CC ไม่เกิน 1,500 : 400 บาท<br>
                    • CC 1,501 - 2,000 : 800 บาท<br>
                    • CC มากกว่า 2,000 : 1,200 บาท
                </div>
            </li>
            <li>
                <span class="info-title">ส่วนลดตามอายุรถยนต์</span>
                <div class="info-detail">
                    • มากกว่า 5 ปี : ลด 10%<br>
                    • มากกว่า 10 ปี : ลด 20%
                </div>
            </li>
        </ul>
    </div>
</div>

<script>
    function calculateTax() {
        const cc = parseFloat(document.getElementById('ccInput').value);
        const type = document.getElementById('carType').value;
        const age = parseFloat(document.getElementById('ageInput').value);
        const display = document.getElementById('result-display');

        if (isNaN(cc) || isNaN(age)) {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
            return;
        }

        let baseTax = 0;

        // 1. คำนวณตามประเภทและ CC
        if (type === "private") {
            if (cc <= 1500) baseTax = 500;
            else if (cc <= 2000) baseTax = 1000;
            else baseTax = 1500;
        } else { // รถกระบะ
            if (cc <= 1500) baseTax = 400;
            else if (cc <= 2000) baseTax = 800;
            else baseTax = 1200;
        }

        // 2. คำนวณส่วนลดตามอายุรถ
        let discount = 0;
        let discountText = "0%";
        if (age > 10) {
            discount = baseTax * 0.20;
            discountText = "20%";
        } else if (age > 5) {
            discount = baseTax * 0.10;
            discountText = "10%";
        }

        const finalTax = baseTax - discount;

        // 3. แสดงผล
        display.style.display = "block";
        display.innerHTML = `
            <div class="res-row">
                <span>ภาษีเริ่มต้น:</span>
                <span>${baseTax.toLocaleString()} บาท</span>
            </div>
            <div class="res-row" style="color: var(--text-muted);">
                <span>ส่วนลดอายุรถ (${age} ปี - ลด ${discountText}):</span>
                <span>- ${discount.toLocaleString()} บาท</span>
            </div>
            <div class="total-row">
                <span style="font-weight:bold;">ภาษีที่ต้องชำระ:</span>
                <span class="res-price">${finalTax.toLocaleString()} บาท</span>
            </div>
        `;
    }

    function resetPage() {
        document.getElementById('ccInput').value = '';
        document.getElementById('ageInput').value = '';
        document.getElementById('carType').selectedIndex = 0;
        document.getElementById('result-display').style.display = "none";
    }
</script>

</body>
</html>