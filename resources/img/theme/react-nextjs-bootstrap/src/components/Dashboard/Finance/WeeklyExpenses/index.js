"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const WeeklyExpenses = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Weekly Expenses",
      data: [0, 25, 40, 50, 80, 70, 140],
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
    colors: ["#AD63F6", "#605DFF"],
    dataLabels: {
      enabled: false,
    },
    grid: {
      borderColor: "#ECEEF2",
    },
    stroke: {
      curve: "straight", //straight', 'smooth', 'monotoneCubic', 'stepline
      width: 2,
    },
    xaxis: {
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      axisTicks: {
        show: false,
        color: "#B1BBC8",
      },
      axisBorder: {
        show: false,
        color: "#B1BBC8",
      },
      labels: {
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      tickAmount: 4,
      max: 140,
      min: 0,
      labels: {
        formatter: (val) => {
          return "$" + val + "";
        },
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      opposite: "right",
    },
    legend: {
      show: true,
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
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
        shape: "diamond",
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 stats-box">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between flex-wrap gap-2 mb-3">
            <div>
              <div className="d-flex align-items-center">
                <span>Weekly Expenses</span>

                <span className="d-inline-block px-2 bg-danger bg-opacity-10 text-danger border border-danger rounded-pill fs-12 fw-medium ms-2">
                  -5.1%
                </span>
              </div>
              <h3 className="fs-20 mt-1 mb-0">$1,200</h3>
            </div>
            <span className="fs-12">Last 7 days</span>
          </div>

          <div style={{ margin: "-25px -11px -28px -2px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={130}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default WeeklyExpenses;
