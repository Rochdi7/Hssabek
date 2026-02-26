"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const CriticalPatients = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Orthopedics",
      data: [
        10, 15, 21, 25, 19, 15, 25, 20, 20, 15, 21, 25, 17, 18, 15, 20, 15, 20,
        18, 13,
      ],
    },
    {
      name: "Cardiology",
      data: [3, 7, 7, 10, 9, 7, 15, 3, 7, 7, 10, 9, 7, 13, 3, 7, 7, 10, 9, 7],
    },
  ];

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    colors: ["#FD5812", "#796DF6"],
    dataLabels: {
      enabled: false,
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    stroke: {
      curve: "straight",
      width: 2,
    },
    xaxis: {
      categories: [
        "01 Jan",
        "02 Jan",
        "03 Jan",
        "04 Jan",
        "05 Jan",
        "06 Jan",
        "07 Jan",
        "08 Jan",
        "09 Jan",
        "10 Jan",
        "11 Jan",
        "12 Jan",
        "13 Jan",
        "14 Jan",
        "15 Jan",
        "16 Jan",
        "17 Jan",
        "18 Jan",
        "19 Jan",
        "20 Jan",
      ],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        show: false,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      // tickAmount: 6,
      show: false,
      max: 25,
      min: 0,
      labels: {
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
    },
    legend: {
      show: false,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "left",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <span className="d-block mb-2">Critical Patients</span>
          <h3 className="fs-18 mb-3">780</h3>

          <div style={{ margin: "0 -10px 0 -12px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={130}
              />
            )}
          </div>

          <div className="d-flex align-items-center mb-2 mt-2">
            <span
              style={{
                width: "12px",
                height: "2px",
              }}
              className="bg-primary d-inline-block me-2"
            ></span>
            <span>
              Cardiology: <span className="fw-semibold">280</span>
            </span>
          </div>

          <div className="d-flex align-items-center mb-0">
            <span
              style={{
                width: "12px",
                height: "2px",
              }}
              className="bg-danger d-inline-block me-2"
            ></span>
            <span>
              Orthopedics: <span className="fw-semibold">600</span>
            </span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default CriticalPatients;
