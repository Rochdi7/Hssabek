"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const SemiCircularGaugeRadialBarChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [76];

  const options = {
    chart: {
      offsetY: -20,
    },
    plotOptions: {
      radialBar: {
        startAngle: -90,
        endAngle: 90,
        track: {
          background: "#e7e7e7",
          strokeWidth: "97%",
          margin: 5, // margin is in pixels
          dropShadow: {
            enabled: true,
            top: 2,
            left: 0,
            opacity: 0.31,
            blur: 2,
          },
        },
        dataLabels: {
          name: {
            show: false,
          },
          value: {
            offsetY: -2,
            fontSize: "22px",
          },
        },
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        shade: "light",
        shadeIntensity: 0.4,
        inverseColors: false,
        opacityFrom: 1,
        opacityTo: 1,
        // stops: [0, 50, 53, 91]
      },
    },
    labels: ["Average Results"],
    colors: ["#605DFF"],
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Semi Circular Gauge RadialBar Chart</h3>
          </div>

          <div className="pt-4">
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="radialBar"
                height={410}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SemiCircularGaugeRadialBarChart;
