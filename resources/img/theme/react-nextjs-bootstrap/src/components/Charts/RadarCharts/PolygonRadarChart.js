"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const PolygonRadarChart = () => {
  const [Chart, setChart] = useState(null);

  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Series 1",
      data: [20, 100, 40, 30, 50, 80, 33],
    },
  ];

  const options = {
    dataLabels: {
      enabled: true,
    },
    plotOptions: {
      radar: {
        size: 140,
        polygons: {
          fill: {
            colors: ["#f8f8f8", "#ffffff"],
          },
        },
      },
    },
    title: {
      text: "Radar with Polygon Fill",
      align: "left",
      offsetX: -9,
      style: {
        fontWeight: "500",
        fontSize: "14px",
        color: "#64748B",
      },
    },
    colors: ["#605DFF"],
    markers: {
      shape: 'diamond',
      size: 4,
      colors: ["#ffffff"],
      strokeColors: ["#0f79f3"],
      strokeWidth: 2,
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val;
        },
      },
    },
    xaxis: {
      categories: [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
      ],
    },
    yaxis: {
      tickAmount: 7,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Polygon Radar Chart</h3>
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

export default PolygonRadarChart;
