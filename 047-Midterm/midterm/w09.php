<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.3 ระบบแสดงสูตรคูณ - Green Theme</title>
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
            justify-content: flex-start;
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

        .btn-show { 
            background-color: var(--primary-color); 
            color: white; 
        }

        .btn-show:hover { 
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
            align-items: center;
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
            padding: 15px;
            background-color: var(--light-accent);
            border-radius: 15px;
            border: 2px solid var(--primary-color);
            display: none;
            max-height: 350px;
            overflow-y: auto;
            animation: fadeIn 0.4s ease;
        }

        .multi-row {
            display: flex;
            justify-content: center;
            padding: 10px 0;
            border-bottom: 1px solid #cbd5e1;
            font-size: 18px;
            color: var(--text-dark);
        }

        .multi-row:last-child { border-bottom: none; }

        .multi-row span { margin: 0 8px; }

        .highlight-res { color: var(--primary-color); font-weight: bold; font-size: 20px; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive */
        @media (max-width: 850px) {
            .main-card { flex-direction: column; }
            .info-section { padding: 30px; order: -1; }
            .info-section { order: 1; }
        }

        /* Scrollbar custom (Green Style) */
        #result-display::-webkit-scrollbar { width: 8px; }
        #result-display::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        #result-display::-webkit-scrollbar-thumb { background: #a7f3d0; border-radius: 10px; }
        #result-display::-webkit-scrollbar-thumb:hover { background: var(--primary-color); }
    </style>
</head>
<body>

<div class="main-card">
    <div class="form-section">
        <h2>2.3 สูตรคูณ</h2>
        
        <div class="form-group">
            <label>กรอกแม่สูตรคูณ</label>
            <input type="number" id="multiInput" placeholder="กรอกแม่สูตรคูณ (เช่น 12)">
        </div>

        <div class="btn-group">
            <button class="btn-show" onclick="generateTable()">แสดงสูตรคูณ</button>
            <button class="btn-clear" onclick="clearAll()">ล้างข้อมูล</button>
        </div>

        <div id="result-display"></div>
    </div>

    <div class="info-section">
        <h3>รายละเอียดโจทย์</h3>
        <p class="info-desc">
            กรอก <span class="highlight">แม่สูตรคูณ</span> ที่ต้องการ (เช่น 2, 3, 5) แล้วระบบจะแสดงตารางสูตรคูณตั้งแต่ 1 ถึง 12
        </p>
        
        <ul class="info-list">
            <li>แสดงผลการคูณของตัวเลขในช่วง 1 ถึง 12</li>
            <li>สูตรคูณตามแม่ที่ผู้ใช้กรอก</li>
        </ul>
    </div>
</div>

<script>
    function generateTable() {
        const input = document.getElementById('multiInput');
        const display = document.getElementById('result-display');
        const n = parseInt(input.value);

        if (input.value === "" || isNaN(n)) {
            alert("กรุณากรอกตัวเลขแม่สูตรคูณด้วยครับ");
            return;
        }

        display.style.display = "block";
        display.innerHTML = ""; // ล้างค่าเก่า

        // วนลูปสร้างสูตรคูณ 1 - 12
        for (let i = 12; i <= 1; i++) {
            const row = document.createElement('div');
            row.className = 'multi-row';
            row.innerHTML = `
                <span>${n}</span> 
                <span style="color:var(--text-muted);">×</span> 
                <span>${i}</span> 
                <span style="color:var(--text-muted);">=</span> 
                <span class="highlight-res">${(n * i).toLocaleString()}</span>
            `;
            display.appendChild(row);
        }
    }

    function clearAll() {
        document.getElementById('multiInput').value = '';
        document.getElementById('result-display').style.display = "none";
    }
</script>

</body>
</html>