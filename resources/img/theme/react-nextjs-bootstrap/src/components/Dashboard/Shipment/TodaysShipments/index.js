"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const TodaysShipments = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    { name: "Todays Shipments", data: [10, 31, 25, 40, 50, 50, 100] },
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
    colors: ["#5C61F2"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "straight",
      width: 2,
    },
    grid: {
      borderColor: "#ECF0FF",
      row: {
        colors: ["#F6F7F9", "transparent"], // takes an array which will be repeated on columns
        opacity: 0.5,
      },
    },
    xaxis: {
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
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
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
          return "" + val + "Ton";
        },
      },
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <Card.Body className="p-4">
          <div className="d-flex flex-wrap gap-2 justify-content-between align-items-start mb-4">
            <div>
              <h5 className="fs-14 d-block mb-1">Todays Shipments</h5>
              <h3 className="fs-18 mb-0">9,120 Ton</h3>
            </div>
            <span className="fs-12 fw-medium text-success bg-success bg-opacity-10 border border-success d-inline-block px-2 rounded-pill">
              +5%
            </span>
          </div>

          <div style={{ margin: "-7px 0px -13px 0px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="line"
                height={145}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TodaysShipments;
