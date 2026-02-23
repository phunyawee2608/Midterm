<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1.5 คำนวณค่าบริการอินเทอร์เน็ต - Green Theme</title>
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

        /* Card หลักแบ่ง 2 ฝั่ง */
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
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.1);
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

        /* --- ฝั่งขวา: รายละเอียด (Green Theme) --- */
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
            margin-bottom: 15px;
            text-align: center;
            font-weight: 600;
        }

        .info-desc {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 300;
            font-size: 15px;
            opacity: 0.9;
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

        .pkg-name {
            font-weight: bold;
            font-size: 18px;
            display: block;
            margin-bottom: 8px;
            text-decoration: underline;
            text-decoration-thickness: 2px;
            text-underline-offset: 4px;
        }

        .pkg-detail {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.95;
            padding-left: 5px;
            font-weight: 300;
        }

        /* --- ส่วนแสดงผลลัพธ์ --- */
        #result-box {
            margin-top: 25px;
            padding: 20px;
            background-color: var(--light-accent);
            border-radius: 12px;
            border-left: 5px solid var(--primary-color);
            display: none;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .res-total { 
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
        <h2>1.5 คำนวณค่าบริการอินเทอร์เน็ต</h2>
        
        <div class="form-group">
            <label>จำนวนชั่วโมงใช้งาน</label>
            <input type="number" id="hoursInput" placeholder="กรอกจำนวนชั่วโมง">
        </div>

        <div class="form-group">
            <label>แพ็กเกจอินเทอร์เน็ต</label>
            <select id="packageType">
                <option value="basic">Basic</option>
                <option value="premium">Premium</option>
            </select>
        </div>

        <div class="btn-group">
            <button class="btn-calc" onclick="calculateNet()">คำนวณ</button>
            <button class="btn-clear" onclick="clearData()">ล้างข้อมูล</button>
        </div>

        <div id="result-box"></div>
    </div>

    <div class="info-section">
        <h3>รายละเอียดแพ็กเกจ</h3>
        <p class="info-desc">เลือกแพ็กเกจอินเทอร์เน็ตและกรอกจำนวนชั่วโมงที่ใช้งานเพื่อคำนวณค่าบริการทั้งหมด</p>
        
        <ul class="info-list">
            <li>
                <span class="pkg-name">แพ็กเกจ Basic</span>
                <div class="pkg-detail">
                    • 0-20 ชั่วโมง: 10 บาท/ชั่วโมง<br>
                    • 21-50 ชั่วโมง: 8 บาท/ชั่วโมง<br>
                    • มากกว่า 50 ชั่วโมง: 5 บาท/ชั่วโมง<br>
                    • ค่าบริการคงที่: 100 บาท
                </div>
            </li>
            <li>
                <span class="pkg-name">แพ็กเกจ Premium</span>
                <div class="pkg-detail">
                    • 0-20 ชั่วโมง: 15 บาท/ชั่วโมง<br>
                    • 21-50 ชั่วโมง: 12 บาท/ชั่วโมง<br>
                    • มากกว่า 50 ชั่วโมง: 10 บาท/ชั่วโมง<br>
                    • ค่าบริการคงที่: 200 บาท
                </div>
            </li>
        </ul>
    </div>
</div>

<script>
    function calculateNet() {
        const hours = parseFloat(document.getElementById('hoursInput').value);
        const package = document.getElementById('packageType').value;
        const resultDiv = document.getElementById('result-box');

        if (isNaN(hours) || hours < 0) {
            alert("กรุณากรอกจำนวนชั่วโมงให้ถูกต้อง");
            return;
        }

        let hourlyRate = 0;
        let fixedFee = 0;
        let packageNameText = "";

        // ตรวจสอบเงื่อนไข
        if (package === "basic") {
            fixedFee = 100;
            packageNameText = "Basic";
            if (hours <= 20) hourlyRate = 10;
            else if (hours <= 50) hourlyRate = 8;
            else hourlyRate = 5;
        } else {
            fixedFee = 200;
            packageNameText = "Premium";
            if (hours <= 20) hourlyRate = 15;
            else if (hours <= 50) hourlyRate = 12;
            else hourlyRate = 10;
        }

        const variableCost = hours * hourlyRate;
        const totalCost = variableCost + fixedFee;

        resultDiv.style.display = "block";
        resultDiv.innerHTML = `
            <div style="font-size:16px; color:var(--text-dark);">
                แพ็กเกจ: <strong>${packageNameText}</strong> (${hours} ชม.)<br>
                ค่าชั่วโมง (${hourlyRate} บ.): ${variableCost.toLocaleString()} บาท<br>
                ค่าบริการคงที่: ${fixedFee.toLocaleString()} บาท
            </div>
            <hr style="border:0; border-top:1px dashed #a7f3d0; margin:10px 0;">
            <div style="font-size:18px; color:var(--text-muted);">ยอดรวมที่ต้องชำระ:</div>
            <div class="res-total">${totalCost.toLocaleString()} บาท</div>
        `;
    }

    function clearData() {
        document.getElementById('hoursInput').value = '';
        document.getElementById('packageType').selectedIndex = 0;
        document.getElementById('result-box').style.display = "none";
    }
</script>

</body>
</html>