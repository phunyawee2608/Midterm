<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบคำนวณเงินเดือน - Modern Theme</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* --- ส่วนกำหนดชุดสี (เปลี่ยนธีมตรงนี้) --- */
        /* ปัจจุบันใช้: ธีมสีเขียวการเงิน (Green Finance) */
        :root {
            --primary-color: #059669;   /* สีหลัก (ปุ่ม, หัวข้อผลลัพธ์) */
            --secondary-color: #047857; /* สีรอง (ใช้ไล่เฉดสีฝั่งขวา) */
            --light-accent: #ecfdf5;    /* สีพื้นหลังอ่อนๆ (กล่องผลลัพธ์) */
            --bg-color: #f3f4f6;        /* สีพื้นหลังรวมของหน้าเว็บ */
            --text-dark: #1f2937;       /* สีข้อความปกติ */
            --text-muted: #6b7280;      /* สีข้อความรอง/ตัวจาง */
        }
        /* --------------------------------------- */

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

        /* Container หลักสำหรับแบ่ง 2 ฝั่ง */
        .main-wrapper {
            background: white;
            border-radius: 24px; /* เพิ่มความโค้งมน */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08); /* ปรับเงาให้นุ่มขึ้น */
            width: 100%;
            max-width: 950px;
            display: flex;
            overflow: hidden;
        }

        /* ฝั่งซ้าย: ฟอร์มคำนวณ */
        .form-section {
            flex: 1.2; /* ขยายฝั่งซ้ายให้กว้างกว่านิดหน่อย */
            padding: 50px;
            background-color: #ffffff;
        }

        /* ฝั่งขวา: คำอธิบาย */
        .info-section {
            flex: 1;
            padding: 50px;
            /* ใช้ตัวแปรสีใหม่ในการไล่ระดับ */
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
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

        .info-section h2 {
            color: white;
            text-align: left; /* จัดชิดซ้ายให้ดูทันสมัยขึ้น */
            font-size: 30px;
            margin-bottom: 20px;
        }

        .input-group { margin-bottom: 25px; }

        label {
            display: block;
            margin-bottom: 10px;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 15px;
        }

        input, select {
            width: 100%;
            padding: 14px;
            border: 2px solid #e5e7eb;
            border-radius: 12px; /* เพิ่มความโค้งมน */
            font-size: 16px;
            font-family: 'Kanit', sans-serif;
            transition: all 0.3s;
            outline: none;
            box-sizing: border-box;
            color: var(--text-dark);
            background-color: #f9fafb; /* พื้นหลัง input สีเทาจางๆ */
        }

        input:focus, select:focus {
            border-color: var(--primary-color);
            background-color: #fff;
            box-shadow: 0 0 0 4px var(--light-accent); /* ใช้สี accent ทำเงา */
        }

        .btn-container {
            display: flex;
            gap: 15px;
            margin-top: 35px;
        }

        button {
            flex: 1;
            padding: 16px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Kanit', sans-serif;
            transition: all 0.3s ease;
        }

        .btn-calculate {
            /* ใช้สีหลัก */
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .btn-calculate:hover {
            /* ใช้สีรองตอน hover */
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .btn-clear {
            background-color: #f3f4f6;
            color: var(--text-muted);
        }

        .btn-clear:hover {
            background-color: #e5e7eb;
            color: var(--text-dark);
        }

        /* Styling เนื้อหาฝั่งขวา */
        .info-content p {
            line-height: 1.7;
            margin-bottom: 25px;
            font-weight: 300;
            font-size: 17px;
            opacity: 0.95;
        }

        .info-content ul {
            list-style: none;
            padding: 0;
        }

        .info-content li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            font-weight: 300;
            font-size: 16px;
        }

        .info-content li::before {
            content: "•";
            margin-right: 12px;
            font-size: 20px;
            line-height: 1.4;
            opacity: 0.7;
            color: rgba(255,255,255,0.8);
        }

        /* พื้นที่แสดงผลลัพธ์ */
        #result-area {
            margin-top: 35px;
            padding: 25px;
            /* ใช้สี accent เป็นพื้นหลัง */
            background-color: var(--light-accent);
            border-radius: 16px;
            /* ใช้สีหลักเป็นเส้นขอบ */
            border-left: 6px solid var(--primary-color);
            display: none;
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .result-title {
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 10px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .salary-amount {
            font-size: 18px;
            color: var(--text-dark);
            line-height: 1.5;
        }
        
        /* คลาสสำหรับตัวเลขเงินเดือนที่เน้น */
        .highlight-salary {
            color: var(--primary-color); /* ใช้สีเดียวกับธีม */
            font-weight: 700;
            font-size: 28px;
            display: block;
            margin-top: 5px;
        }

        .ot-info {
            color: var(--text-muted);
            font-size: 15px;
            margin-top: 5px;
            display: block;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .main-wrapper {
                flex-direction: column;
                max-width: 500px;
            }
            .form-section, .info-section {
                padding: 35px;
            }
            .info-section h2 { text-align: center; }
        }
    </style>
</head>
<body>

<div class="main-wrapper">
    <div class="form-section">
        <h2>คำนวณเงินเดือนพนักงาน</h2>

        <div class="input-group">
            <label for="empName">ชื่อพนักงาน</label>
            <input type="text" id="empName" placeholder="ระบุชื่อ-นามสกุล">
        </div>

        <div class="input-group">
            <label for="workHours">จำนวนชั่วโมงทำงาน / เดือน</label>
            <input type="number" id="workHours" placeholder="เช่น 160 หรือ 180">
        </div>

        <div class="input-group">
            <label for="empPosition">ตำแหน่ง</label>
            <select id="empPosition">
                <option value="" disabled selected>-- กรุณาเลือกตำแหน่ง --</option>
                <option value="100">ปฏิบัติการ (100 บ./ชม.)</option>
                <option value="200">หัวหน้างาน (200 บ./ชม.)</option>
                <option value="300">ผู้จัดการ (300 บ./ชม.)</option>
            </select>
        </div>

        <div class="btn-container">
            <button class="btn-calculate" onclick="doCalculate()">คำนวณเงินเดือน</button>
            <button class="btn-clear" onclick="doReset()">ล้างข้อมูล</button>
        </div>

        <div id="result-area"></div>
    </div>

    <div class="info-section">
        <h2>เงื่อนไขการคำนวณ</h2>
        <div class="info-content">
            <p>ระบบจะคำนวณเงินเดือนตามตำแหน่งและชั่วโมงทำงานจริง โดยมีอัตราและเงื่อนไขดังนี้:</p>
            <ul>
                <li><strong>ระดับปฏิบัติการ:</strong> อัตรา 100 บาท/ชั่วโมง</li>
                <li><strong>ระดับหัวหน้างาน:</strong> อัตรา 200 บาท/ชั่วโมง</li>
                <li><strong>ระดับผู้จัดการ:</strong> อัตรา 300 บาท/ชั่วโมง</li>
                <li><strong>ค่าล่วงเวลา (OT):</strong> หากทำงานเกิน 160 ชั่วโมง/เดือน ส่วนที่เกินจะคำนวณเพิ่มเป็น 1.5 เท่าของอัตราปกติ</li>
            </ul>
        </div>
    </div>
</div>

<script>
    function doCalculate() {
        const nameInput = document.getElementById('empName');
        const hoursInput = document.getElementById('workHours');
        const positionSelect = document.getElementById('empPosition');
        const resBox = document.getElementById('result-area');

        const name = nameInput.value.trim();
        const hours = parseFloat(hoursInput.value);
        const rate = parseFloat(positionSelect.value);

        // Validation: ตรวจสอบข้อมูลนำเข้า
        if (!name) {
            alert("กรุณาระบุชื่อพนักงาน");
            nameInput.focus();
            return;
        }
        if (isNaN(hours) || hours < 0) {
            alert("กรุณาระบุจำนวนชั่วโมงทำงานที่ถูกต้อง");
            hoursInput.focus();
            return;
        }
        if (isNaN(rate)) {
            alert("กรุณาเลือกตำแหน่งพนักงาน");
            positionSelect.focus();
            return;
        }

        let salary = 0;
        let otInfoHtml = "";
        const REGULAR_HOURS_LIMIT = 160;
        const OT_MULTIPLIER = 1.5;

        // คำนวณเงินเดือน
        if (hours <= REGULAR_HOURS_LIMIT) {
            salary = hours * rate;
            otInfoHtml = `<small class="ot-info">(ไม่มีการทำงานล่วงเวลา)</small>`;
        } else {
            const normalSalary = REGULAR_HOURS_LIMIT * rate;
            const otHours = hours - REGULAR_HOURS_LIMIT;
            const otRate = rate * OT_MULTIPLIER;
            const otSalary = otHours * otRate;
            salary = normalSalary + otSalary;
            
            otInfoHtml = `
                <small class="ot-info">
                    รวม OT: ${otHours} ชม. (อัตรา ${otRate} บ./ชม.) <br>
                    คิดเป็นเงิน OT: ${otSalary.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})} บาท
                </small>`;
        }

        // แปลง Value กลับเป็นชื่อตำแหน่งเพื่อแสดงผล
        let posName = "ไม่ระบุ";
        if(rate === 100) posName = "ระดับปฏิบัติการ";
        else if(rate === 200) posName = "ระดับหัวหน้างาน";
        else if(rate === 300) posName = "ระดับผู้จัดการ";

        // แสดงผลลัพธ์
        resBox.style.display = "block";
        // ใช้ CSS Class แทนการฝัง style สีลงไปตรงๆ
        resBox.innerHTML = `
            <div class="result-title">ผลลัพธ์การคำนวณ</div>
            <div class="salary-amount">
                คุณ <strong>${name}</strong> (${posName})<br>
                ชั่วโมงทำงานรวม: ${hours} ชั่วโมง
                <span class="highlight-salary">${salary.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})} บาท</span>
                ${otInfoHtml}
            </div>
        `;
    }

    function doReset() {
        document.getElementById('empName').value = '';
        document.getElementById('workHours').value = '';
        document.getElementById('empPosition').selectedIndex = 0;
        document.getElementById('result-area').style.display = "none";
    }
</script>

</body>
</html>