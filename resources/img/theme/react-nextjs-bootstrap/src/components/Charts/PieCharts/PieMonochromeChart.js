"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const PieMonochromeChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [25, 15, 44, 55, 41, 17];

  const options = {
    labels: [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
    ],
    theme: {
      monochrome: {
        enabled: true,
      },
    },
    legend: {
      show: true,
      offsetY: 0,
      fontSize: "12px",
      labels: {
        colors: "#64748B",
      },
      itemMargin: {
        horizontal: 0,
        vertical: 5,
      },
      markers: {
        shape: 'diamond',
        offsetX: -2,
        offsetY: -0.5,
      },
    },
    dataLabels: {
      enabled: false,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Pie Monochrome Chart</h3>
          </div>

          <div 
            style={{
              marginTop: "-10px", 
            }}
            className="t-chart"
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="pie"
                height={360}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default PieMonochromeChart;
