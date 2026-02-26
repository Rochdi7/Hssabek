"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const BasicPieChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [60, 30, 10];

  const options = {
    labels: ["Completed", "New Order", "Pending"],
    colors: ["#37D80A", "#605DFF", "#AD63F6"],
    legend: {
      show: true,
      fontSize: "12px",
      position: "bottom",
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
    dataLabels: {
      enabled: false,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Basic Pie Chart</h3>
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

export default BasicPieChart;
