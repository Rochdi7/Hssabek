"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const MonochromePolarChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [42, 39, 35, 29, 26];

  const options = {
    labels: ["Rose A", "Rose B", "Rose C", "Rose D", "Rose E"],
    fill: {
      opacity: 1,
    },
    stroke: {
      width: 1,
      colors: undefined,
    },
    yaxis: {
      show: false,
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
    plotOptions: {
      polarArea: {
        rings: {
          strokeWidth: 0,
        },
      },
    },
    theme: {
      monochrome: {
        // enabled: true,
        shadeTo: "light",
        shadeIntensity: 0.6,
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Monochrome Polar Chart</h3>
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

export default MonochromePolarChart;
