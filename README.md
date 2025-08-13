# Web Robot Arm Control Panel

This project implements a minimal web panel to:  
1. Render 6 sliders for robot joints.  
2. Fetch the latest pose from the database via `get_run_pose.php`.  
3. Reset the device status via `update_status.php` (sets `status=0`).  

---

## Stack
- **Frontend**: HTML, CSS, Vanilla JS  
- **Backend**: PHP 7+ (mysqli)  
- **Database**: MySQL / MariaDB  

---

## Database
Import:
```
server/sql/schema.sql
```
It creates:
- `poses(id, m1..m6, created_at)` — stores saved joint angles.  
- `status(id, val, updated_at)` — single row for status flag (default `id=1, val=0`).  

Seed test pose:
```sql
INSERT INTO poses(m1,m2,m3,m4,m5,m6)
VALUES (10,20,30,40,50,60);
```

---

## PHP Endpoints

**GET** `/get_run_pose.php`  
Returns latest pose:
```json
{
  "pose": { "m1": 10, "m2": 20, "m3": 30, "m4": 40, "m5": 50, "m6": 60 },
  "time": "2025-08-12 10:20:30"
}
```

**POST** `/update_status.php`  
Sets `status.val=0` for `id=1`.  
Body:
```
id=1
```
Response:
```
ok
```

---

## Frontend Config
In `public/app.js`, set:
```js
const API = "http://YOUR_SERVER_IP";
```
- **Get Pose** → fetches last pose, updates sliders.  
- **Set status = 0** → calls reset API, shows alert.  

---

## Quick Start

**Backend**:  
1. Create DB `robot_panel`.  
2. Import `schema.sql`.  
3. Place PHP files in server root.  

**Frontend**:  
1. Set `API` in `app.js`.  
2. Open `index.html` in browser or serve with backend.  

---

## Notes
- Use same origin for frontend and backend to avoid CORS issues.
