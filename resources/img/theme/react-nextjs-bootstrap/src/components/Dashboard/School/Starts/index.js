"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const statsData = [
  {
    title: "Total Students",
    value: "12,560",
    icon: "/images/total-students.svg",
    trend: "up",
    percentageChange: "+12%",
  },
  {
    title: "Total Teachers",
    value: "780",
    icon: "/images/total-teachers.svg",
    trend: "down",
    percentageChange: "-10%",
  },
  {
    title: "Attendance Today",
    value: "1,425",
    icon: "/images/attendance-today.svg",
    trend: "up",
    percentageChange: "+25%",
  },
];

const Starts = () => {
  return (
    <>
      <div className="card-group mb-4 rounded-3">
        {statsData.map((stat, index) => (
          <Card
            key={index}
            className={`border-border-color bg-white ${
              index === 0
                ? "rounded-start-3"
                : index === statsData.length - 1
                ? "rounded-end-3"
                : ""
            }`}
          >
            <Card.Body className="custom-padding-30 mx-xl-2">
              <div className="d-flex align-items-center mb-5">
                <div className="flex-shrink-0">
                  <Image
                    src={stat.icon}
                    alt={stat.title}
                    width={42}
                    height={42}
                  />
                </div>
                <div className="flex-grow-1 ms-md-3 ms-1">
                  <span className="d-block mb-1">{stat.title}</span>
                  <h3 className="fs-20 fw-semibold mb-0">{stat.value}</h3>
                </div>
              </div>
              <div className="d-flex align-items-center">
                <i
                  className={`${
                    stat.trend === "up"
                      ? "ri-arrow-right-up-line text-success-50"
                      : "ri-arrow-right-down-line text-danger-50"
                  } d-inline-block text-center rounded-1 fs-18`}
                  style={{
                    width: "26px",
                    height: "26px",
                    lineHeight: "26px",
                    backgroundColor:
                      stat.trend === "up" ? "#D8FFC8" : "#FFE1DD",
                  }}
                ></i>
                <p className="ms-2">
                  <span className="text-secondary fw-medium">
                    {stat.percentageChange}
                  </span>{" "}
                  last year
                </p>
              </div>
            </Card.Body>
          </Card>
        ))}
      </div>
    </>
  );
};

export default Starts;
