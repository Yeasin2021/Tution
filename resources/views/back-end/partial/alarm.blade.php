@extends('back-end.index')
@push('style')
    <link rel="stylesheet" href="{{ asset('back-end/css/alarm.css') }}">
@endpush
@section('content')

<div class="container">
    <div class="row pt-3">
      <div class="col-sm">
        <div class="wrapper">
            <img src="./files/clock.svg" alt="clock">
            <h1>00:00:00 PM</h1>
            <div class="content">
              <div class="column">
                <select>
                  <option value="Hour" selected disabled hidden>Hour</option>
                </select>
              </div>
              <div class="column">
                <select>
                  <option value="Minute" selected disabled hidden>Minute</option>
                </select>
              </div>
              <div class="column">
                <select>
                  <option value="AM/PM" selected disabled hidden>AM/PM</option>
                </select>
              </div>
            </div>
            <button>Set Alarm</button>
          </div>
      </div>
    </div>
  </div>


@endsection

@push('js')

<script>
const currentTime = document.querySelector("h1"),
content = document.querySelector(".content"),
selectMenu = document.querySelectorAll("select"),
setAlarmBtn = document.querySelector("button");

let alarmTime, isAlarmSet,
//ringtone = new Audio("./files/ringtone.mp3");
ringtone = new Audio("./files/azan1.mp3");

for (let i = 12; i > 0; i--) {
    i = i < 10 ? `0${i}` : i;
    let option = `<option value="${i}">${i}</option>`;
    selectMenu[0].firstElementChild.insertAdjacentHTML("afterend", option);
}

for (let i = 59; i >= 0; i--) {
    i = i < 10 ? `0${i}` : i;
    let option = `<option value="${i}">${i}</option>`;
    selectMenu[1].firstElementChild.insertAdjacentHTML("afterend", option);
}

for (let i = 2; i > 0; i--) {
    let ampm = i == 1 ? "AM" : "PM";
    let option = `<option value="${ampm}">${ampm}</option>`;
    selectMenu[2].firstElementChild.insertAdjacentHTML("afterend", option);
}

setInterval(() => {
    let date = new Date(),
    h = date.getHours(),
    m = date.getMinutes(),
    s = date.getSeconds(),
    ampm = "AM";
    if(h >= 12) {
        h = h - 12;
        ampm = "PM";
    }
    h = h == 0 ? h = 12 : h;
    h = h < 10 ? "0" + h : h;
    m = m < 10 ? "0" + m : m;
    s = s < 10 ? "0" + s : s;
    currentTime.innerText = `${h}:${m}:${s} ${ampm}`;

    if (alarmTime === `${h}:${m} ${ampm}`) {
        ringtone.play();
        ringtone.loop = true;
    }
});

function setAlarm() {
    if (isAlarmSet) {
        alarmTime = "";
        ringtone.pause();
        content.classList.remove("disable");
        setAlarmBtn.innerText = "Set Alarm";
        return isAlarmSet = false;
    }

    let time = `${selectMenu[0].value}:${selectMenu[1].value} ${selectMenu[2].value}`;
    if (time.includes("Hour") || time.includes("Minute") || time.includes("AM/PM")) {
        return alert("Please, select a valid time to set Alarm!");
    }
    alarmTime = time;
    isAlarmSet = true;
    content.classList.add("disable");
    setAlarmBtn.innerText = "Clear Alarm";
}

setAlarmBtn.addEventListener("click", setAlarm);
</script>

@endpush
