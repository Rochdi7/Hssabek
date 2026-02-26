"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const TotalRevenue = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Revenue",
      data: [0, 35, 25, 45, 30, 45, 25, 45, 70],
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
    colors: ["#FD5812"],
    stroke: {
      width: 2,
      curve: "straight",
    },
    markers: {
      size: 3,
      strokeWidth: 0,
      hover: {
        size: 5,
      },
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    xaxis: {
      categories: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
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
      show: false,
      labels: {
        formatter: (val) => {
          return "$" + val + "k";
        },
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
      <Card className="border bg-white rounded-3 overflow-hidden mb-4">
        <div className="d-flex align-items-center p-4 pb-3 mb-1">
          <div className="flex-shrink-0">
            <div
              className="wh-55 bg-danger bg-opacity-25 text-center rounded-2"
              style={{ lineHeight: "55px" }}
            >
              <i className="ri-money-dollar-circle-line fs-22 bg-danger text-white rounded-2 p-2"></i>
            </div>
          </div>
          <div className="flex-grow-1 ms-3">
            <h3 className="fs-24 fw-medium mb-0">$250,000</h3>
            <span>Total Revenue</span>
          </div>
        </div>

        <div className="d-flex align-items-center p-4 pb-0">
          <span className="d-inline-block bg-success text-success bg-opacity-10 border border-success rounded-pill px-2 fw-medium d-flex align-items-center fs-12">
            <i className="ri-arrow-up-fill fs-14 lh-1"></i>
            12%
          </span>
          <span className="ms-2 fs-12">from last week</span>
        </div>

        <div style={{ margin: "-45px -11px -31px -15px" }}>
          {Chart && (
            <Chart options={options} series={series} type="line" height={120} />
          )}
        </div>
      </Card>
    </>
  );
};

export default TotalRevenue;
