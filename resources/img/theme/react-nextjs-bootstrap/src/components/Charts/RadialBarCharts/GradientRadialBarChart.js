"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const GradientRadialBarChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [75];

  const options = {
    chart: {
      toolbar: {
        show: true,
      },
    },
    plotOptions: {
      radialBar: {
        startAngle: -135,
        endAngle: 225,
        hollow: {
          margin: 0,
          size: "70%",
          background: "#ffffff",
          image: undefined,
          position: "front",
          dropShadow: {
            enabled: true,
            top: 3,
            left: 0,
            blur: 4,
            opacity: 0.24,
          },
        },
        track: {
          background: "#ffffff",
          strokeWidth: "67%",
          margin: 0, // margin is in pixels
          dropShadow: {
            enabled: true,
            top: -3,
            left: 0,
            blur: 4,
            opacity: 0.35,
          },
        },
        dataLabels: {
          show: true,
          name: {
            offsetY: -10,
            show: true,
            color: "#64748B",
            fontSize: "17px",
          },
          value: {
            formatter: function (val) {
              return parseInt(val.toString(), 10).toString();
            },
            color: "#3A4252",
            fontSize: "36px",
            show: true,
          },
        },
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        shade: "dark",
        type: "horizontal",
        shadeIntensity: 0.5,
        gradientToColors: ["#ABE5A1"],
        inverseColors: true,
        opacityFrom: 1,
        opacityTo: 1,
        // stops: [0, 100]
      },
    },
    stroke: {
      lineCap: "round",
    },
    labels: ["Percent"],
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Gradient RadialBar Chart</h3>
          </div>

          {Chart && (
            <Chart
              options={options}
              series={series}
              type="radialBar"
              height={350}
            />
          )}
        </Card.Body>
      </Card>
    </>
  );
};

export default GradientRadialBarChart;
