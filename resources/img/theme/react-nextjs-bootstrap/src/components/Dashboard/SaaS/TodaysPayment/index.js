"use client";

import React, { useEffect, useState } from "react";
import { Form } from "react-bootstrap";

const TodaysPayment = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Today’s Payment",
      data: [20, 50, 60, 30, 30, 40, 60, 70, 40, 50],
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
    colors: ["#FFFFFF"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "monotoneCubic", //curve: ['straight', 'smooth', 'monotoneCubic', 'stepline']
      width: [3],
    },
    grid: {
      borderColor: "#4E3FB9",
    },
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 90, 100],
        shadeIntensity: 1,
        opacityFrom: 0,
        opacityTo: 0.5,
      },
    },
    xaxis: {
      categories: [
        "09:00",
        "10:00",
        "11:00",
        "12:00",
        "13:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
      ],
      axisTicks: {
        show: false,
        color: "#B1BBC8",
      },
      axisBorder: {
        show: false,
        color: "#B1BBC8",
      },
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      tickAmount: 5,
      max: 100,
      min: 0,
      labels: {
        formatter: (val) => {
          return "$" + val / 1 + "K";
        },
        style: {
          colors: "#8695AA",
          fontSize: "12px",
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
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
        shape: "diamond",
      },
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$" + val + "k";
        },
      },
    },
  };

  return (
    <>
      <div
        className="rounded-3 p-4 mb-4"
        style={{
          background: "linear-gradient(104deg, #361E7D 2.4%, #403CFF 112.33%)",
        }}
      >
        <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-1">
          <span className="d-block mb-1" style={{ color: "#B1BBC8" }}>
            Today’s Payment
          </span>
          <Form.Select
            className="month-select form-control w-135 bg-border-color border-color"
            aria-label="Default select example"
          >
            <option value="0">All</option>
            <option value="1">Monthly</option>
            <option value="2">Yearly</option>
          </Form.Select>
        </div>

        <div className="d-flex align-items-center mb-4">
          <h3 className="fs-32 fw-bold text-white mb-0">$1,528</h3>
          <span
            className="fw-medium fs-12 border border-success px-2 rounded-pill ms-2"
            style={{ backgroundColor: "#D8FFC8", color: "#1E8308" }}
          >
            +5.4%
          </span>
        </div>

        <div style={{ margin: "-24px -9px -27px -17px" }}>
          {Chart && (
            <Chart options={options} series={series} type="area" height={340} />
          )}
        </div>
      </div>
    </>
  );
};

export default TodaysPayment;
