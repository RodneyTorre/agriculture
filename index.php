<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRIMIS - Agriculture Management & Monitoring System</title>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300;400;600;800&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --soil-dark: #2d3319;
            --soil-medium: #4a5728;
            --earth-brown: #6b5d3f;
            --harvest-gold: #d4a03a;
            --wheat-light: #f4e8c1;
            --leaf-green: #7ba05b;
            --forest-green: #4a7c3e;
            --sky-blue: #87ceeb;
            --water-blue: #5b9aa9;
            --warning-orange: #e67e22;
            --danger-red: #c0392b;
            --bg-light: #faf8f3;
            --text-primary: #2d3319;
            --text-secondary: #6b5d3f;
            --shadow: rgba(45, 51, 25, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Overpass', sans-serif;
            background: linear-gradient(135deg, var(--bg-light) 0%, var(--wheat-light) 100%);
            color: var(--text-primary);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(122, 160, 91, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(212, 160, 58, 0.03) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, var(--soil-dark) 0%, var(--soil-medium) 100%);
            color: white;
            padding: 0;
            box-shadow: 0 4px 20px var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
            animation: slideDown 0.6s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 3rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--harvest-gold) 0%, var(--leaf-green) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            font-weight: 800;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .system-title h1 {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 0.2rem;
        }

        .system-title p {
            font-size: 0.85rem;
            opacity: 0.8;
            font-weight: 300;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .notifications {
            position: relative;
            cursor: pointer;
        }

        .notification-icon {
            font-size: 1.3rem;
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger-red);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .user-info:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--harvest-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1rem;
        }

        .user-details h3 {
            font-size: 0.9rem;
            font-weight: 600;
        }

        .user-details p {
            font-size: 0.75rem;
            opacity: 0.8;
        }

        /* Navigation */
        nav {
            padding: 0 3rem;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 0;
        }

        nav li {
            position: relative;
        }

        nav a {
            display: block;
            padding: 1rem 1.5rem;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--harvest-gold);
            transition: width 0.3s ease;
        }

        nav a:hover,
        nav a.active {
            color: white;
            background: rgba(255, 255, 255, 0.05);
        }

        nav a.active::after,
        nav a:hover::after {
            width: 100%;
        }

        /* Main Content */
        main {
            padding: 2.5rem 3rem;
            max-width: 1600px;
            margin: 0 auto;
        }

        .dashboard-header {
            margin-bottom: 2.5rem;
            animation: fadeIn 0.8s ease-out 0.2s backwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-header h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--soil-dark);
            margin-bottom: 0.5rem;
            font-family: 'Merriweather', serif;
        }

        .breadcrumb {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1.8rem;
            box-shadow: 0 4px 20px var(--shadow);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            animation: fadeIn 0.8s ease-out backwards;
        }

        .stat-card:nth-child(1) { animation-delay: 0.3s; }
        .stat-card:nth-child(2) { animation-delay: 0.4s; }
        .stat-card:nth-child(3) { animation-delay: 0.5s; }
        .stat-card:nth-child(4) { animation-delay: 0.6s; }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
            background: var(--accent-color);
            opacity: 0.05;
            border-radius: 50%;
            transform: translate(30%, -30%);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px var(--shadow);
        }

        .stat-card.green { --accent-color: var(--leaf-green); }
        .stat-card.gold { --accent-color: var(--harvest-gold); }
        .stat-card.blue { --accent-color: var(--water-blue); }
        .stat-card.orange { --accent-color: var(--warning-orange); }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
        }

        .stat-trend.up {
            background: rgba(122, 160, 91, 0.15);
            color: var(--forest-green);
        }

        .stat-trend.down {
            background: rgba(192, 57, 43, 0.15);
            color: var(--danger-red);
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 0.3rem;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .panel {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px var(--shadow);
            animation: fadeIn 0.8s ease-out 0.7s backwards;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(45, 51, 25, 0.08);
        }

        .panel-header h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--soil-dark);
            font-family: 'Merriweather', serif;
        }

        .panel-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Overpass', sans-serif;
        }

        .btn-primary {
            background: var(--leaf-green);
            color: white;
        }

        .btn-primary:hover {
            background: var(--forest-green);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(122, 160, 91, 0.3);
        }

        .btn-secondary {
            background: transparent;
            border: 1.5px solid var(--soil-medium);
            color: var(--soil-medium);
        }

        .btn-secondary:hover {
            background: var(--soil-medium);
            color: white;
        }

        /* Map Container */
        .map-container {
            height: 350px;
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .map-placeholder {
            text-align: center;
            color: var(--forest-green);
        }

        .map-placeholder svg {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
            opacity: 0.6;
        }

        /* Farm List */
        .farm-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .farm-item {
            padding: 1.2rem;
            background: linear-gradient(135deg, rgba(122, 160, 91, 0.03) 0%, rgba(212, 160, 58, 0.03) 100%);
            border-radius: 12px;
            border-left: 4px solid var(--leaf-green);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .farm-item:hover {
            background: linear-gradient(135deg, rgba(122, 160, 91, 0.08) 0%, rgba(212, 160, 58, 0.08) 100%);
            transform: translateX(5px);
        }

        .farm-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.8rem;
        }

        .farm-name {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--soil-dark);
        }

        .farm-status {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-active {
            background: rgba(122, 160, 91, 0.2);
            color: var(--forest-green);
        }

        .status-monitoring {
            background: rgba(212, 160, 58, 0.2);
            color: #b8860b;
        }

        .farm-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.8rem;
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Recent Activities */
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .activity-item {
            display: flex;
            gap: 1rem;
            padding-bottom: 1.2rem;
            border-bottom: 1px solid rgba(45, 51, 25, 0.08);
        }

        .activity-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .activity-icon.harvest { background: rgba(212, 160, 58, 0.15); }
        .activity-icon.planting { background: rgba(122, 160, 91, 0.15); }
        .activity-icon.irrigation { background: rgba(91, 154, 169, 0.15); }
        .activity-icon.alert { background: rgba(230, 126, 34, 0.15); }

        .activity-content h4 {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--soil-dark);
            margin-bottom: 0.3rem;
        }

        .activity-content p {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 0.3rem;
        }

        .activity-time {
            font-size: 0.75rem;
            color: var(--text-secondary);
            opacity: 0.7;
        }

        /* Bottom Grid */
        .bottom-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
            animation: fadeIn 0.8s ease-out 0.9s backwards;
        }

        /* Chart Placeholder */
        .chart-container {
            height: 250px;
            background: linear-gradient(to bottom, rgba(122, 160, 91, 0.05) 0%, transparent 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed rgba(122, 160, 91, 0.2);
        }

        .chart-placeholder {
            text-align: center;
            color: var(--leaf-green);
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .header-top {
                padding: 1rem 1.5rem;
            }

            nav {
                padding: 0 1.5rem;
                overflow-x: auto;
            }

            nav ul {
                min-width: max-content;
            }

            main {
                padding: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .bottom-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header-top">
                <div class="logo-section">
                    <div class="logo">🌾</div>
                    <div class="system-title">
                        <h1>AGRIMIS</h1>
                        <p>Agriculture Management & Monitoring System</p>
                    </div>
                </div>
                <div class="user-section">
                    <div class="notifications">
                        <span class="notification-icon">🔔</span>
                        <span class="notification-badge">3</span>
                    </div>
                    <div class="user-info">
                        <div class="user-avatar">JD</div>
                        <div class="user-details">
                            <h3>Juan Dela Cruz</h3>
                            <p>LGU Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active">Dashboard</a></li>
                    <li><a href="#">Farm Registry</a></li>
                    <li><a href="#">Crop Monitoring</a></li>
                    <li><a href="#">Weather Data</a></li>
                    <li><a href="#">Reports</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <div class="dashboard-header">
                <h2>Dashboard Overview</h2>
                <p class="breadcrumb">Home / Dashboard</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card green">
                    <div class="stat-header">
                        <div class="stat-icon">🚜</div>
                        <div class="stat-trend up">↑ 12%</div>
                    </div>
                    <div class="stat-value">1,247</div>
                    <div class="stat-label">Registered Farms</div>
                </div>

                <div class="stat-card gold">
                    <div class="stat-header">
                        <div class="stat-icon">🌱</div>
                        <div class="stat-trend up">↑ 8%</div>
                    </div>
                    <div class="stat-value">3,456</div>
                    <div class="stat-label">Hectares Cultivated</div>
                </div>

                <div class="stat-card blue">
                    <div class="stat-header">
                        <div class="stat-icon">💧</div>
                        <div class="stat-trend down">↓ 3%</div>
                    </div>
                    <div class="stat-value">89%</div>
                    <div class="stat-label">Irrigation Coverage</div>
                </div>

                <div class="stat-card orange">
                    <div class="stat-header">
                        <div class="stat-icon">📊</div>
                        <div class="stat-trend up">↑ 15%</div>
                    </div>
                    <div class="stat-value">₱12.4M</div>
                    <div class="stat-label">Harvest Value (MTD)</div>
                </div>
            </div>

            <div class="content-grid">
                <div class="panel">
                    <div class="panel-header">
                        <h3>Farm Distribution Map</h3>
                        <div class="panel-actions">
                            <button class="btn btn-secondary">Filter</button>
                            <button class="btn btn-primary">View All</button>
                        </div>
                    </div>
                    <div class="map-container">
                        <div class="map-placeholder">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <p>Interactive Farm Location Map</p>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <h3>Recent Activities</h3>
                        <div class="panel-actions">
                            <button class="btn btn-secondary">View All</button>
                        </div>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon harvest">🌾</div>
                            <div class="activity-content">
                                <h4>Harvest Completed</h4>
                                <p>Rice Farm #234 - 12 hectares</p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon planting">🌱</div>
                            <div class="activity-content">
                                <h4>New Planting Season</h4>
                                <p>Corn Farm #156 - 8 hectares</p>
                                <span class="activity-time">5 hours ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon irrigation">💧</div>
                            <div class="activity-content">
                                <h4>Irrigation System Updated</h4>
                                <p>Farm #089 - Automated system</p>
                                <span class="activity-time">1 day ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon alert">⚠️</div>
                            <div class="activity-content">
                                <h4>Weather Alert</h4>
                                <p>Heavy rainfall expected - 5 farms</p>
                                <span class="activity-time">1 day ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-grid">
                <div class="panel">
                    <div class="panel-header">
                        <h3>Active Farms Status</h3>
                        <div class="panel-actions">
                            <button class="btn btn-primary">Add Farm</button>
                        </div>
                    </div>
                    <div class="farm-list">
                        <div class="farm-item">
                            <div class="farm-header">
                                <div class="farm-name">San Miguel Rice Farm</div>
                                <span class="farm-status status-active">Active</span>
                            </div>
                            <div class="farm-details">
                                <div class="detail-item">📍 Barangay San Miguel</div>
                                <div class="detail-item">📏 45 hectares</div>
                                <div class="detail-item">🌾 Rice (Variety: PSB Rc82)</div>
                                <div class="detail-item">👤 Owner: Maria Santos</div>
                            </div>
                        </div>
                        <div class="farm-item">
                            <div class="farm-header">
                                <div class="farm-name">Rosario Corn Plantation</div>
                                <span class="farm-status status-monitoring">Monitoring</span>
                            </div>
                            <div class="farm-details">
                                <div class="detail-item">📍 Barangay Rosario</div>
                                <div class="detail-item">📏 32 hectares</div>
                                <div class="detail-item">🌽 Yellow Corn</div>
                                <div class="detail-item">👤 Owner: Pedro Reyes</div>
                            </div>
                        </div>
                        <div class="farm-item">
                            <div class="farm-header">
                                <div class="farm-name">Santa Cruz Vegetable Farm</div>
                                <span class="farm-status status-active">Active</span>
                            </div>
                            <div class="farm-details">
                                <div class="detail-item">📍 Barangay Santa Cruz</div>
                                <div class="detail-item">📏 18 hectares</div>
                                <div class="detail-item">🥬 Mixed Vegetables</div>
                                <div class="detail-item">👤 Owner: Ana Mercado</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <h3>Monthly Yield Trends</h3>
                        <div class="panel-actions">
                            <button class="btn btn-secondary">Export</button>
                        </div>
                    </div>
                    <div class="chart-container">
                        <div class="chart-placeholder">
                            <p>📈 Yield Analytics Chart</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom-grid">
                <div class="panel">
                    <div class="panel-header">
                        <h3>Crop Distribution</h3>
                    </div>
                    <div class="chart-container">
                        <div class="chart-placeholder">
                            <p>🥧 Crop Type Distribution</p>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <h3>Weather Forecast</h3>
                    </div>
                    <div class="chart-container">
                        <div class="chart-placeholder">
                            <p>🌤️ 7-Day Weather Forecast</p>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <h3>Soil Health Monitor</h3>
                    </div>
                    <div class="chart-container">
                        <div class="chart-placeholder">
                            <p>🌱 Soil Quality Metrics</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Add smooth scrolling and interactive elements
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Add click handlers for interactive elements
        document.querySelectorAll('.farm-item').forEach(item => {
            item.addEventListener('click', function() {
                console.log('Farm clicked:', this.querySelector('.farm-name').textContent);
            });
        });

        // Notification click handler
        document.querySelector('.notifications').addEventListener('click', function() {
            alert('You have 3 new notifications:\n1. Weather alert for 5 farms\n2. Harvest completed at Farm #234\n3. New farmer registration pending');
        });
    </script>
</body>
</html>