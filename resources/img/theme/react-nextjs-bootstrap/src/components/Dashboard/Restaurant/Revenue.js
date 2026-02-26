"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const Revenue = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [80, 20];

  const options = {
    labels: ["Revenue", "Revenue"],
    colors: ["#58F229", "#D8FFC8"],
    tooltip: {
      y: {
        formatter: (val) => {
          return "$" + val + "M";
        },
      },
    },
    stroke: {
      width: 0,
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
    dataLabels: {
      enabled: false,
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white revenue-card mb-4">
        <div className="d-flex align-items-center position-relative">
          <div className="flex-shrink-0">
            <span className="fs-14">Revenue</span>
            <h2 className="text-secondary-50">$3M</h2>
            <span
              className="d-inline-block bg-success-80 rounded-pill text-success-60 fs-12 fw-medium mb-1"
              style={{
                padding: "1px 7.3px",
              }}
            >
              +3.4%
            </span>
            <p className="fs-12">vs previous 30 days</p>
          </div>
          <div className="flex-grow-1 ms-3">
            <div
              style={{
                margin: "7px -5px 0 0",
                maxWidth: "90px",
              }}
              className="ms-auto"
            >
              {Chart && (
                <Chart
                  options={options}
                  series={series}
                  type="donut"
                  height={100}
                />
              )}
            </div>
          </div>
        </div>
      </Card>
    </>
  );
};

export default Revenue;
