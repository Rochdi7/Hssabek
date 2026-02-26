"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const CustomAngleCircleRadialBarChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [100, 90, 80, 70];

  const options = {
    plotOptions: {
      radialBar: {
        offsetY: 0,
        startAngle: 0,
        endAngle: 270,
        hollow: {
          margin: 10,
          size: "30%",
          image: undefined,
          background: "transparent",
        },
        dataLabels: {
          name: {
            show: false,
          },
          value: {
            show: false,
          },
        },
      },
    },
    colors: ["#757FEF", "#9EA5F4", "#C8CCF9", "#F1F2FD"],
    labels: ["Completed", "Active", "Assigned", "Pending"],
    legend: {
      show: true,
      offsetY: 0,
      offsetX: -20,
      floating: true,
      position: "left",
      fontSize: "13px",
      labels: {
        colors: "#64748B",
      },
      formatter: function (seriesName, opts) {
        return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex];
      },
      itemMargin: {
        horizontal: 0,
        vertical: 4,
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Custom Angle Circle RadialBar Chart</h3>
          </div>

          {Chart && (
            <Chart
              options={options}
              series={series}
              type="radialBar"
              height={375}
            />
          )}
        </Card.Body>
      </Card>
    </>
  );
};

export default CustomAngleCircleRadialBarChart;
