"use client";

import React from "react";
import { Row, Col, Card } from "react-bootstrap";
import Image from "next/image";

const statsData = [
  {
    title: "Appointments",
    value: 32,
    trend: "-0.04%",
    trendColor: "danger",
    icon: "/images/appointments-icon.svg",
  },
  {
    title: "Patients",
    value: 334,
    trend: "+7%",
    trendColor: "success",
    icon: "/images/patients-icon.svg",
  },
  {
    title: "Operations",
    value: 12,
    trend: "5.4%",
    trendColor: "success",
    icon: "/images/operations-icon.svg",
  },
  {
    title: "Earnings",
    value: "$312",
    trend: "-1.4%",
    trendColor: "danger",
    icon: "/images/earnings-icon.svg",
  },
];

const Stats = () => {
  return (
    <>
      <Row>
        {statsData.map((stat, index) => (
          <Col sm={6} lg={3} key={index}>
            <Card className="border-0 rounded-3 bg-white p-4 mb-4">
              <div className="d-flex justify-content-between">
                <div>
                  <span className="d-block mb-2">{stat.title}</span>
                  <h2 className="mb-2 fw-900 fs-28">{stat.value}</h2>
                  <span
                    className={`d-inline-block bg-${stat.trendColor} bg-opacity-10 border-${stat.trendColor} border px-2 rounded-pill text-${stat.trendColor} fs-12 fw-medium`}
                  >
                    {stat.trend}
                  </span>
                </div>
                <div className="flex-shrink-0">
                  <Image
                    src={stat.icon}
                    alt={`${stat.title}-icon`}
                    width={46}
                    height={46}
                  />
                </div>
              </div>
            </Card>
          </Col>
        ))}
      </Row>
    </>
  );
};

export default Stats;