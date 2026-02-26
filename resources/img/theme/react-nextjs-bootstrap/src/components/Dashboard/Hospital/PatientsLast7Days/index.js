"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const PatientsLast7Days = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Patients",
      data: [60, 50, 40, 50, 45, 40, 60],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#FE7A36"],
    plotOptions: {
      bar: {
        borderRadius: 3,
        columnWidth: "9px",
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 2,
      show: true,
      colors: ["transparent"],
    },
    xaxis: {
      categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
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
      max: 60,
      min: 0,
      labels: {
        show: false,
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
    fill: {
      opacity: 1,
    },
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "center",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        shape: 'diamond',
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
  };

  return (
    <>
      <Card className="bg-danger bg-opacity-25 border-0 rounded-3 p-4 mb-4 overflow-hidden">
        <span className="d-block mb-3" style={{ color: "#526077" }}>
          Patients last 7 days
        </span>

        <div className="d-flex align-items-center">
          <h3 className="fs-24 fw-medium mb-0">768</h3>
          <span
            className="d-inline-block px-2 text-danger border-danger border rounded-pill bg-opacity-25 fs-12 fw-medium ms-2"
            style={{ backgroundColor: "#FFC8C0" }}
          >
            <i className="ri-arrow-up-fill"></i>
            7%
          </span>
        </div>

        <div style={{ margin: "-5px -19px -31px -32px" }}>
          {Chart && (
            <Chart options={options} series={series} type="bar" height={100} />
          )}
        </div>
      </Card>
    </>
  );
};

export default PatientsLast7Days;
