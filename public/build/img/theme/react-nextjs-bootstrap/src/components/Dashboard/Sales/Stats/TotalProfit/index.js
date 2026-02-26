"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const TotalProfit = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Profit",
      data: [3, 5, 10, 5, 9, 7, 15],
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
    colors: ["#3584FC"],
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
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
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
      // max: 150,
      // min: 0,
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
      <Card className="border bg-white rounded-3 overflow-hidden mb-4">
        <div className="d-flex align-items-center p-4 pb-3 mb-1">
          <div className="flex-shrink-0">
            <div
              className="wh-55 bg-card-bg-c bg-opacity-25 text-center rounded-2"
              style={{ lineHeight: "55px" }}
            >
              <i className="ri-wallet-2-line fs-22 bg-card-bg-c text-white rounded-2 p-2"></i>
            </div>
          </div>
          <div className="flex-grow-1 ms-3">
            <h3 className="fs-24 fw-medium mb-0">$80,000</h3>
            <span>Total Profit</span>
          </div>
        </div>

        <div className="d-flex align-items-center p-4 pb-0">
          <span className="d-inline-block bg-danger text-danger bg-opacity-10 border border-danger rounded-pill px-2 fw-medium d-flex align-items-center fs-12">
            <i className="ri-arrow-down-fill fs-14 lh-1"></i>
            7%
          </span>
          <span className="ms-2 fs-12">from last week</span>
        </div>

        <div style={{ margin: "-45px -11px -31px -15px" }}>
          {Chart && (
            <Chart options={options} series={series} type="area" height={120} />
          )}
        </div>
      </Card>
    </>
  );
};

export default TotalProfit;
