"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const BasicPolarChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [14, 23, 21, 17, 15, 10, 12, 17, 21];

  const options = {
    stroke: {
      colors: ["#ffffff"],
    },
    fill: {
      opacity: 0.8,
    },
    labels: [
      "Bananas",
      "Apples",
      "Grapes",
      "Papayas",
      "Mangos",
      "Blueberrys",
      "Cherrys",
      "Oranges",
      "Pineapples",
    ],
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    legend: {
      show: true,
      position: "bottom",
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
        shape: 'diamond',
        offsetX: -2,
        offsetY: -0.5,
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Basic Polar Chart</h3>
          </div>

          {Chart && (
            <Chart
              options={options}
              series={series}
              type="polarArea"
              height={500}
            />
          )}
        </Card.Body>
      </Card>
    </>
  );
};

export default BasicPolarChart;
