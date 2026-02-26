"use client";

import React, { useEffect, useState } from "react";
import Calendar from "react-calendar";
import Image from "next/image";

const TodaysSchedule = () => {
  const [date, setDate] = useState(new Date());
  const [schedule, setSchedule] = useState([]);

  useEffect(() => {
    // Simulate fetching data from an API
    const fetchData = async () => {
      // Replace with actual data fetching logic
      const data = [
        {
          id: 1,
          time: "10:00 AM",
          title: "Appointment With Cardiac Patient",
          person: "Jonathon Ronan",
          image: "/images/user-82.png",
          bgColor: "#DDE4FF",
        },
        {
          id: 2,
          time: "12:00 PM",
          title: "Major Cardiac Surgery of the patient",
          person: "Walter White",
          image: "/images/user-84.png",
          bgColor: "#DAEBFF",
        },
        {
          id: 3,
          time: "02:00 PM",
          title: "Board Meeting With",
          person: "Jessy Pinkman",
          image: "/images/user-83.png",
          bgColor: "#C8FFE1",
        },
      ];
      setSchedule(data);
    };

    fetchData();
  }, []);

  return (
    <>
      <div className="card bg-white border-0 rounded-3 mb-4">
        <div className="card-body p-4">
          <div className="calendar-container">
            <div className="d-flex gap-1 justify-content-between align-items-center mb-3 mb-lg-4">
              <h3 className="fs-18 fw-semibold letter-spacing-1 mb-0">
                Today’s Schedule
              </h3>
            </div>
          </div>

          <Calendar onChange={setDate} value={date} className={"ra-calendar"} />

          <div
            className="pt-4 mb-4 border-bottom" 
          ></div>

          <div
            className="pr-5"
            style={{ maxHeight: "585.66px", overflowY: "auto" }}
          >
            {schedule.map((item) => (
              <div
                key={item.id}
                className="p-4 rounded-3 position-relative mb-4 schedule-for-dark"
                style={{
                  backgroundColor: item.bgColor,
                }}
              >
                <span className="text-000 fw-semibold d-block">
                  {item.time}
                </span>
                <p className="mb-2">{item.title}</p>
                <div className="d-flex align-items-center mb-3">
                  <Image
                    src={item.image}
                    className="rounded-circle border border-color-white"
                    alt="user"
                    width={25}
                    height={25}
                  />
                  <span className="fw-semibold ms-1">{item.person}</span>
                </div>

                <div className="d-flex justify-content-between align-items-center">
                  <button className="btn bg-white text-primary fw-semibold hover-bg">
                    View Details
                  </button>
                  <div
                    className="bg-primary text-center rounded-circle"
                    style={{
                      width: "28px",
                      height: "28px",
                      lineHeight: "34px",
                    }}
                  >
                    <span className="material-symbols-outlined fs-18 text-white">
                      notifications
                    </span>
                  </div>
                </div>

                <Image
                  src="/images/shape-12.png"
                  className="position-absolute top-0 end-0"
                  alt="shape"
                  width={55}
                  height={80}
                />
              </div>
            ))}
          </div>
        </div>
      </div>
    </>
  );
};

export default TodaysSchedule;
