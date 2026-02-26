"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const OverallVisitors = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Visitors",
      data: [30, 70, 50, 75, 40, 80, 50, 100],
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
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "straight",
      width: 2,
    },
    colors: ["#9747FF"],
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 90, 100],
        shadeIntensity: 1,
        opacityFrom: 0.5,
        opacityTo: 0.9,
      },
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
      tickAmount: 5,
      show: false,
      max: 100,
      min: 0,
      labels: {
        show: true,
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: true,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: true,
        color: "#ECEEF2",
      },
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
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
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
  };

  return (
    <>
      <Card className="bg-primary-div bg-opacity-25 border-0 rounded-3 p-4 mb-4 overflow-hidden">
        <span className="d-block mb-3" style={{ color: "#526077" }}>
          Overall Visitors
        </span>

        <div className="d-flex align-items-center">
          <h3 className="fs-24 fw-medium mb-0">45,745</h3>
          <span
            className="d-inline-block px-2 text-success border-success border rounded-pill bg-opacity-25 fs-12 fw-medium ms-2"
            style={{ backgroundColor: "#D8FFC8" }}
          >
            <i className="ri-arrow-up-fill"></i>
            7%
          </span>
        </div>

        <div style={{ margin: "-16px -35px -80px -38px" }}>
          {Chart && (
            <Chart options={options} series={series} type="area" height={160} />
          )}
        </div>
      </Card>
    </>
  );
};

export default OverallVisitors;
