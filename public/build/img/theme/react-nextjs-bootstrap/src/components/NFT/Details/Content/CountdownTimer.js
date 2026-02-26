"use client";

import React from "react";

const CountdownTimer = () => {
  const [days, setDays] = React.useState("");
  const [hours, setHours] = React.useState("");
  const [minutes, setMinutes] = React.useState("");
  const [seconds, setSeconds] = React.useState("");

  React.useEffect(() => {
    const interval = setInterval(() => {
      commingSoonTime();
    }, 1000);
    return () => clearInterval(interval);
  }, []);

  const commingSoonTime = () => {
    let endTime = new Date("August 23, 2026 17:00:00 PDT");
    let endTimeParse = Date.parse(endTime) / 1000;
    let now = new Date();
    let nowParse = Date.parse(now) / 1000;
    let timeLeft = endTimeParse - nowParse;
    let days = Math.floor(timeLeft / 86400);
    let hours = Math.floor((timeLeft - days * 86400) / 3600);
    let minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
    let seconds = Math.floor(
      timeLeft - days * 86400 - hours * 3600 - minutes * 60
    );
    if (hours < "10") {
      hours = "0" + hours;
    }
    if (minutes < "10") {
      minutes = "0" + minutes;
    }
    if (seconds < "10") {
      seconds = "0" + seconds;
    }
    setDays(days);
    setHours(hours);
    setMinutes(minutes);
    setSeconds(seconds);
  };

  return (
    <>
      <div className="text-center">
        <span className="fs-12 d-block mb-1 text-body">Auction End In:</span>

        <div className="clockdiv position-static bg-transparent p-0 m-0">
          <ul className="ps-0 mb-0 list-unstyled d-flex align-items-center gap-3 justify-content-center">
            <li className="time">
              {days}
              <span>d</span>
            </li>
            <li className="time">
              {hours}
              <span>h</span>
            </li>
            <li className="time">
              {minutes}
              <span>m</span>
            </li>
            <li className="time">
              {seconds}
              <span>s</span>
            </li>
          </ul>
        </div>
      </div>
    </>
  );
};

export default CountdownTimer;
