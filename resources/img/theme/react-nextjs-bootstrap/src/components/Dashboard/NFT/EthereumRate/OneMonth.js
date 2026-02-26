"use client";

import React, { useEffect, useState } from "react";

const OneMonth = () => {
  const [Chart, setChart] = useState();

  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Ethereum Rate",
      data: [20, 40, 60, 60, 50, 30, 20, 20, 40, 40, 60, 60],
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
    stroke: {
      curve: "stepline", //curve: ['straight', 'smooth', 'monotoneCubic', 'stepline']
      width: 3,
      lineCap: "10",
    },
    grid: {
      borderColor: "#ECF0FF",
      strokeDashArray: 0,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 90, 100],
        shadeIntensity: 1,
        opacityFrom: 0,
        opacityTo: 0.8,
      },
    },
    xaxis: {
      categories: ["NOV 16", "17", "18", "19", "20", "21"],
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
      tickAmount: 4,
      max: 80,
      min: 0,
      labels: {
        show: false,
        formatter: (val) => {
          return val / 1 + "K";
        },
        style: {
          colors: "#9C9AB6",
          fontSize: "12px",
          fontWeight: 500,
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
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
      },
    },
  };

  return (
    <>
      <div style={{ margin: "-30px -5px 0 -21px" }}>
        {Chart && (
          <Chart options={options} series={series} type="area" height={245} />
        )}
      </div>

      <ul className="ps-0 mb-0 list-unstyled mt-30">
        <li className="d-flex justify-content-between align-items-center mb-4">
          <span className="fs-12 fw-bold">11:30 AM</span>
          <span className="fs-12 fw-semibold text-secondary">$3,605.08</span>
          <span className="fs-12 fw-medium text-success">+5.4% </span>
        </li>
        <li className="d-flex justify-content-between align-items-center mb-4">
          <span className="fs-12 fw-bold">01:20 PM</span>
          <span className="fs-12 fw-semibold text-secondary">$3,615.50</span>
          <span className="fs-12 fw-medium text-danger">-3.21%</span>
        </li>
        <li className="d-flex justify-content-between align-items-center">
          <span className="fs-12 fw-bold">11:30 AM</span>
          <span className="fs-12 fw-semibold text-secondary">$3,831.13</span>
          <span className="fs-12 fw-medium text-success">+7.32%</span>
        </li>
      </ul>
    </>
  );
};

export default OneMonth;
