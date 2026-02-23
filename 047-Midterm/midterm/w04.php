<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1.4 คำนวณค่าแรงพนักงาน - Green Theme</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* --- ชุดสี Green Finance (เหมือนระบบก่อนหน้า) --- */
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

        /* Container หลักแบ่ง 2 ฝั่ง */
        .main-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 950px;
            display: flex;
            overflow: hidden;
        }

        /* --- ฝั่งซ้าย: ฟอร์มคำนวณ --- */
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
            transition: all 0.3s;
            box-sizing: border-box;
            outline: none;
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
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
            font-family: 'Kanit', sans-serif;
        }

        .btn-calculate {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-calculate:hover {
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

        /* --- ฝั่งขวา: เงื่อนไข (Green Theme) --- */
        .info-section {
            flex: 1;
            padding: 40px;
            /* Gradient สีเขียว */
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .info-section h3 {
            font-size: 26px;
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 600;
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-list li {
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: 300;
            display: flex;
            align-items: flex-start;
        }

        .info-list li::before {
            content: "•";
            margin-right: 12px;
            font-weight: bold;
            font-size: 20px;
            color: rgba(255,255,255,0.8);
        }

        .highlight {
            font-weight: 500;
            background: rgba(255,255,255,0.2);
            padding: 2px 8px;
            border-radius: 6px;
            margin-right: 5px;
        }

        /* --- ส่วนแสดงผลลัพธ์ --- */
        #result {
            margin-top: 25px;
            padding: 20px;
            background-color: var(--light-accent);
            border-radius: 12px;
            border-left: 5px solid var(--primary-color);
            display: none;
            animation: fadeIn 0.4s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .result-title {
            color: var(--secondary-color);
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
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
        <h2>1.4 คำนวณค่าแรงพนักงาน</h2>
        
        <div class="form-group">
            <label>จำนวนชั่วโมงทำงาน</label>
            <input type="number" id="hours" placeholder="ระบุจำนวนชั่วโมง">
        </div>

        <div class="form-group">
            <label>ประเภทงาน</label>
            <select id="workType">
                <option value="50">งานทั่วไป (50 บ.)</option>
                <option value="100">งานพิเศษ (100 บ.)</option>
                <option value="150">งานเร่งด่วน (150 บ.)</option>
            </select>
        </div>

        <div class="btn-group">
            <button class="btn-calculate" onclick="calculateWage()">คำนวณค่าแรง</button>
            <button class="btn-clear" onclick="clearForm()">เคลียร์ผลลัพธ์</button>
        </div>

        <div id="result">
            <div class="result-title">ผลการคำนวณ:</div>
            <div id="output"></div>
        </div>
    </div>

    <div class="info-section">
        <h3>เงื่อนไขการคำนวณ</h3>
        <ul class="info-list">
            <li><span class="highlight">งานทั่วไป</span> ชั่วโมงละ 50 บาท</li>
            <li><span class="highlight">งานพิเศษ</span> ชั่วโมงละ 100 บาท</li>
            <li><span class="highlight">งานเร่งด่วน</span> ชั่วโมงละ 150 บาท</li>
            <li>ชั่วโมงที่เกิน 8 ชั่วโมง คิดค่า OT 1.5 เท่าของค่าจ้างปกติ</li>
        </ul>
    </div>
</div>

<script>
    function calculateWage() {
        const hoursInput = document.getElementById('hours');
        const workTypeSelect = document.getElementById('workType');
        const resultDiv = document.getElementById('result');
        const outputDiv = document.getElementById('output');

        const hours = parseFloat(hoursInput.value);
        const rate = parseFloat(workTypeSelect.value);

        if (isNaN(hours) || hours < 0) {
            alert("กรุณากรอกจำนวนชั่วโมงทำงานให้ถูกต้อง");
            return;
        }

        let totalWage = 0;
        let normalWage = 0;
        let otWage = 0;

        // คำนวณค่าแรง (เกิน 8 ชม. คิด OT)
        if (hours <= 8) {
            totalWage = hours * rate;
            normalWage = totalWage;
        } else {
            normalWage = 8 * rate;
            const otHours = hours - 8;
            otWage = otHours * (rate * 1.5);
            totalWage = normalWage + otWage;
        }

        // หาชื่อประเภทงานเพื่อแสดงผล
        let workName = "";
        if(rate == 50) workName = "งานทั่วไป";
        else if(rate == 100) workName = "งานพิเศษ";
        else workName = "งานเร่งด่วน";

        resultDiv.style.display = 'block';
        
        // ใช้ CSS Variable และสีที่เข้าธีมใน HTML string
        outputDiv.innerHTML = `
            <div style="margin-bottom: 8px;">ประเภท: <strong>${workName}</strong> (${hours} ชม.)</div>
            <div>ค่าแรงปกติ: ${normalWage.toLocaleString()} บาท</div>
            ${otWage > 0 ? `<div style="color:#d97706; margin-top:4px;">+ ค่า OT: ${otWage.toLocaleString()} บาท</div>` : ''}
            
            <hr style="border: 0; border-top: 1px dashed #a7f3d0; margin: 15px 0;">
            
            <span style="font-size: 24px; color: var(--primary-color); font-weight:bold;">
                รวมสุทธิ: ${totalWage.toLocaleString()} บาท
            </span>
        `;
    }

    function clearForm() {
        document.getElementById('hours').value = '';
        document.getElementById('workType').selectedIndex = 0;
        document.getElementById('result').style.display = 'none';
    }
</script>

</body>
</html>