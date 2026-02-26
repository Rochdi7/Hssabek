"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const MultipleRadarChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Series Blue",
      data: [80, 50, 30, 40, 100, 20],
    },
    {
      name: "Series Green",
      data: [20, 30, 40, 80, 20, 80],
    },
    {
      name: "Series Orange",
      data: [44, 76, 78, 13, 43, 10],
    },
  ];

  const options = {
    chart: {
      dropShadow: {
        enabled: true,
        blur: 1,
        left: 1,
        top: 1,
      },
    },
    title: {
      text: "Radar Chart - Multi Series",
      align: "left",
      offsetX: -9,
      style: {
        fontWeight: "500",
        fontSize: "14px",
        color: "#64748B",
      },
    },
    stroke: {
      width: 0,
    },
    fill: {
      opacity: 0.4,
    },
    markers: {
      size: 0,
    },
    xaxis: {
      categories: ["2011", "2012", "2013", "2014", "2015", "2016"],
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
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
            <h3 className="mb-0">Multiple Radar Chart</h3>
          </div>

          {Chart && (
            <Chart
              options={options}
              series={series}
              type="radar"
              height={400}
            />
          )}
        </Card.Body>
      </Card>
    </>
  );
};

export default MultipleRadarChart;
