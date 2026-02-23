<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.7 ค้นหาจำนวนเฉพาะ - Green Theme</title>
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
            
            /* สีเฉพาะสำหรับกล่องตัวเลขจำนวนเฉพาะ (ปรับให้เข้ากับธีมเขียว) */
            --prime-item-bg: #dcfce7;
            --prime-item-text: #166534;
            --prime-item-border: #bbf7d0;
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
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: 600;
            line-height: 1.4;
        }

        .form-group { margin-bottom: 20px; }

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
            margin-top: 15px;
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

        .btn-search { 
            background-color: var(--primary-color); 
            color: white; 
        }

        .btn-search:hover { 
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

        .res-title { font-weight: 500; color: var(--text-dark); margin-bottom: 15px; font-size: 18px; }
        
        .prime-list { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 8px; 
            max-height: 200px;
            overflow-y: auto;
        }

        .prime-item {
            background-color: var(--prime-item-bg);
            color: var(--prime-item-text);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            border: 1px solid var(--prime-item-border);
        }

        .no-result { color: #ef4444; font-size: 16px; text-align: center; font-weight: 500; }

        /* Responsive */
        @media (max-width: 850px) {
            .main-card { flex-direction: column; }
            .info-section { padding: 30px; order: -1; }
            .info-section { order: 1; }
        }

        /* Scrollbar custom (Green Style) */
        .prime-list::-webkit-scrollbar { width: 6px; }
        .prime-list::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        .prime-list::-webkit-scrollbar-thumb { background: #a7f3d0; border-radius: 10px; }
        .prime-list::-webkit-scrollbar-thumb:hover { background: var(--primary-color); }
    </style>
</head>
<body>

<div class="main-card">
    <div class="form-section">
        <h2>2.7 ค้นหาจำนวนเฉพาะ (prime number)</h2>
        
        <div class="form-group">
            <label>ช่วงเริ่มต้น (start)</label>
            <input type="number" id="startInput" placeholder="กรอกช่วงเริ่มต้น">
        </div>

        <div class="form-group">
            <label>ช่วงสิ้นสุด (end)</label>
            <input type="number" id="endInput" placeholder="กรอกช่วงสิ้นสุด">
        </div>

        <div class="btn-group">
            <button class="btn-search" onclick="findPrimes()">ค้นหา</button>
            <button class="btn-clear" onclick="clearData()">ล้างข้อมูล</button>
        </div>

        <div id="result-display">
            <div class="res-title" id="resTitle"></div>
            <div id="primeContainer" class="prime-list"></div>
        </div>
    </div>

    <div class="info-section">
        <h3>รายละเอียดโจทย์</h3>
        <p class="info-desc">
            กรอกช่วงตัวเลขเริ่มต้นและสิ้นสุดเพื่อแสดงตัวเลขเฉพาะในช่วงนั้น
        </p>
        
        <ul class="info-list">
            <li>ตัวเลขเฉพาะต้องไม่มีตัวหารอื่น นอกจาก 1 และตัวมันเอง</li>
            <li>โปรแกรมจะวนซ้ำตรวจสอบตัวเลขในช่วงที่กำหนด</li>
        </ul>
    </div>
</div>

<script>
    function isPrime(num) {
        if (num <= 1) return false;
        for (let i = 2; i <= Math.sqrt(num); i++) {
            if (num % i === 0) return false;
        }
        return true;
    }

    function findPrimes() {
        const start = parseInt(document.getElementById('startInput').value);
        const end = parseInt(document.getElementById('endInput').value);
        const display = document.getElementById('result-display');
        const container = document.getElementById('primeContainer');
        const title = document.getElementById('resTitle');

        if (isNaN(start) || isNaN(end)) {
            alert("กรุณากรอกช่วงตัวเลขให้ครบถ้วนครับ");
            return;
        }

        let primes = [];
        // วนซ้ำตรวจสอบตัวเลขในช่วงที่กำหนด
        const minVal = Math.min(start, end);
        const maxVal = Math.max(start, end);

        for (let i = minVal; i <= maxVal; i++) {
            if (isPrime(i)) {
                primes.push(i);
            }
        }

        display.style.display = "block";
        container.innerHTML = "";
        
        // ใช้สีเขียวหลักเน้นจำนวนที่พบ
        title.innerHTML = `จำนวนเฉพาะในช่วง <strong>${minVal}</strong> ถึง <strong>${maxVal}</strong> มีทั้งหมด <span style="color:var(--primary-color); font-size:22px; font-weight:bold;">${primes.length}</span> ตัว:`;

        if (primes.length > 0) {
            primes.forEach(p => {
                const span = document.createElement('span');
                span.className = 'prime-item';
                span.textContent = p;
                container.appendChild(span);
            });
        } else {
            container.innerHTML = `<div class="no-result">ไม่พบจำนวนเฉพาะในช่วงนี้</div>`;
        }
    }

    function clearData() {
        document.getElementById('startInput').value = '';
        document.getElementById('endInput').value = '';
        document.getElementById('result-display').style.display = "none";
    }
</script>

</body>
</html>