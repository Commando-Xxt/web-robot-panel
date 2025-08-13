// set your API host (no trailing slash)
const API = "http://YOUR_SERVER_IP"; // change

const ids = ["m1","m2","m3","m4","m5","m6"];
ids.forEach((k,i)=>{
  const el = document.getElementById(k);
  const v = document.getElementById("v"+(i+1));
  el.addEventListener("input", ()=> v.textContent = el.value);
});

document.getElementById("btnGet").onclick = async () => {
  const r = await fetch(API + "/get_run_pose.php");
  const j = await r.json();
  const p = j.pose || {m1:0,m2:0,m3:0,m4:0,m5:0,m6:0};
  ids.forEach(k=>{
    const el = document.getElementById(k);
    el.value = p[k];
    document.getElementById("v"+(ids.indexOf(k)+1)).textContent = p[k];
  });
  const tbody = document.getElementById("t");
  const tr = document.createElement("tr");
  const t = j.time || "";
  tr.innerHTML = `<td>1</td><td>${p.m1}</td><td>${p.m2}</td><td>${p.m3}</td><td>${p.m4}</td><td>${p.m5}</td><td>${p.m6}</td><td>${t}</td>`;
  tbody.innerHTML = "";
  tbody.appendChild(tr);
};

document.getElementById("btnReset").onclick = async () => {
  await fetch(API + "/update_status.php", { method: "POST", body: new URLSearchParams({id:"1"}) });
  alert("status = 0 set");
};
