"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const MultipleRadialBarChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [44, 55, 67, 83];

  const options = {
    plotOptions: {
      radialBar: {
        dataLabels: {
          name: {
            fontSize: "22px",
          },
          value: {
            fontSize: "16px",
          },
          total: {
            show: true,
            label: "Total",
            formatter: function (w) {
              return "249";
            },
          },
        },
      },
    },
    labels: ["Apples", "Oranges", "Bananas", "Berries"],
    colors: ["#3584FC", "#FF4023", "#ffc107", "#605DFF"],
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Multiple Radial Bar Chart</h3>
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

export default MultipleRadialBarChart;
