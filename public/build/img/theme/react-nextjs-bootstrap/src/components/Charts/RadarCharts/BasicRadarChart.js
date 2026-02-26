"use client";

import React, { useEffect, useState } from "react";
import { Card} from "react-bootstrap";

const BasicRadarChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Trezo",
      data: [80, 50, 30, 40, 100, 20],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: true,
      },
    },
    title: {
      text: "Basic Radar Chart",
      align: "left",
      offsetX: -9,
      style: {
        fontWeight: "500",
        fontSize: "14px",
        color: "#64748B",
      },
    },
    xaxis: {
      categories: ["January", "February", "March", "April", "May", "June"],
    },
    colors: ["#605DFF"],
    yaxis: {
      show: true,
      tickAmount: 4,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Basic Radar Chart</h3>
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

export default BasicRadarChart;
