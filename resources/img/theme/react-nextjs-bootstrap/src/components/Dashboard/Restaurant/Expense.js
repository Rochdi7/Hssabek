"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const Expense = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Up",
      data: [70, 42, 70, 120, 40, 70],
    },
    {
      name: "Down",
      data: [-70, -44, -70, -120, -40, -70],
    },
  ];

  const options = {
    chart: {
      stacked: true,
      toolbar: {
        show: false,
      },
    },
    colors: ["#BF85FB", "#5DA8FF"],
    plotOptions: {
      bar: {
        borderRadius: 2,
        columnWidth: "4px",
        borderRadiusApplication: "end",
        borderRadiusWhenStacked: "all",
      },
    },
    dataLabels: {
      enabled: false,
    },
    grid: {
      strokeDashArray: 7,
      borderColor: "#ECEEF2",
      xaxis: {
        lines: {
          show: false,
        },
      },
      yaxis: {
        lines: {
          show: false,
        },
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
    xaxis: {
      categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri"],
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
    tooltip: {
      y: {
        formatter: (val) => {
          return `${Math.abs(value).toFixed(2)}%`;
        },
      },
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white revenue-card mb-4">
        <div className="d-flex align-items-center position-relative">
          <div className="flex-shrink-0">
            <span className="fs-14">Expense</span>
            <h2 className="text-secondary-50">$132K</h2>
            <span
              className="d-inline-block rounded-pill fs-12 fw-medium mb-1"
              style={{
                padding: "1px 7.3px",
                backgroundColor: "#FFE1DD",
                color: "#ff4023",
              }}
            >
              -1.2%
            </span>
            <p className="fs-12">vs previous 30 days</p>
          </div>
          <div className="flex-grow-1 ms-3">
            <div
              style={{
                margin: "-93px -12px 0 0",
                maxHeight: "80px",
                maxWidth: "110px",
              }}
              className="ms-auto"
            >
              {Chart && (
                <Chart
                  options={options}
                  series={series}
                  type="bar"
                  height={180}
                />
              )}
            </div>
          </div>
        </div>
      </Card>
    </>
  );
};

export default Expense;
