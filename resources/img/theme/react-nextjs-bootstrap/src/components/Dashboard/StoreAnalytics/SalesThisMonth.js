"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const SalesThisMonth = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Sales This Month",
      data: [10, 31, 25, 40, 50, 50, 100, 90, 90],
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
    markers: {
      size: 0,
      strokeWidth: 0,
      hover: {
        size: 0,
      },
    },
    colors: ["#37D80A"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "straight",
      width: 6,
    },
    grid: {
      borderColor: "#ECF0FF",
    },
    xaxis: {
      show: false,
      categories: ["3am", "6am", "9am", "12pm", "3pm", "6pm", "9pm", "12am"],
      axisTicks: {
        show: false,
        color: "#B1BBC8",
      },
      axisBorder: {
        show: false,
        color: "#B1BBC8",
      },
      labels: {
        show: false,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
          fontFamily: "Inter",
        },
      },
    },
    yaxis: {
      show: false,
      tickAmount: 3,
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    tooltip: {
      y: {
        formatter: (val) => {
          return "$" + val + "K";
        },
      },
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white p-4 mb-4">
        <div className="mb-3">
          <span className="d-block mb-1">Sales This Month</span>

          <h3 className="fs-28 fw-bold text-secondary mb-1">$64.5K</h3>

          <span className="fw-medium fs-12 text-danger bg-danger bg-opacity-10 border border-danger px-2 rounded-pill d-inline-block">
            -1.4%
          </span>
        </div>

        <div style={{ margin: "-29px -11px -29px -11px" }}>
          {Chart && (
            <Chart options={options} series={series} type="line" height={170} />
          )}
        </div>
      </Card>
    </>
  );
};

export default SalesThisMonth;
